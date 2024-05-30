<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Peminatan;
use App\Models\PklPlace;
use App\Models\User;
use App\Models\VSawHasil;
use App\Models\VTopsisHasil;
use App\Models\VWpHasil;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminController extends Controller
{
    public function index()
    {
        $tempat_pkl_aktif = PklPlace::where('status', 'aktif')->count();
        $hasil_spk_siswa = User::where('w1', '!=', 0)->count();
        $users_aktif = User::where('status', 'aktif')
                        ->where(function ($query) {
                            $query->where('role', '!=', 'admin');
                        })
                    ->count();
        return view('admin.dashboard', ["tempat_pkl_aktif" => $tempat_pkl_aktif, "hasil_spk_siswa" => $hasil_spk_siswa, "users_aktif" => $users_aktif]);
    }

    public function tempat_pkl()
    {
        return view('admin.tempat_pkl');
    }

    public function manajemen_pengguna()
    {
        return view('admin.manajemen_pengguna');
    }

    public function hasil_spk()
    {
        $data_siswa = User::where(function ($query) {
            $query->where('w1', '!=', 0);
        })
                    ->where('id', '>', 1)
                    ->get();
        return view('admin.hasil_spk', ['data_siswa' => $data_siswa]);
    }

    public function barcode_generator(Request $request)
    {
        // $requestContent = $request->except(['name_file', 'nisn']);
        // $postData = json_encode($requestContent);
        // $apiKey = env('API_KEY_QR');
        // $url = 'https://api.qr-code-generator.com/v1/create?access-token=' . $apiKey;
        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        // $fileContents = curl_exec($ch);
        // if (curl_errno($ch)) {
        //     $errorMessage = curl_error($ch);
        // }
        // curl_close($ch);

        $fileContents = QrCode::format('png')
            ->size(800)->errorCorrection('H')
            ->backgroundColor(160, 10, 82)
            ->color(255, 255, 255)
            ->eye('square')
            ->margin(4)
            ->generate($request->qr_code_text);

        // Mendefinisikan nama file dan tipe konten
        $filename = $request->name_file . ' - ' . $request->nisn . '.png';
        $contentType = 'image/png';

        // Mengembalikan respons dengan konten gambar dan header yang sesuai
        return response($fileContents, 200)
            ->header('Content-Type', $contentType)
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    public function download_pdf_admin(Request $request)
    {
        $vsaw_hasils = VSawHasil::where('user_id', $request->id)
                        ->whereNotNull('hasil')
                        ->orderBy('hasil', 'desc')
                        ->get();

        $vwp_hasils = VWpHasil::where('id', $request->id)
                        ->whereNotNull('hasil')
                        ->orderBy('hasil', 'desc')
                        ->get();

        $topsis_hasils = VTopsisHasil::where('user_id', $request->id)
                        ->whereNotNull('hasil')
                        ->orderBy('hasil', 'desc')
                        ->get();

        $name = $request->name;
        $nis = $request->nisn;
        $timestamp = User::where('id', $request->id)->first()->updated_at;

        $pdf = Pdf::loadView('siswa.result_pdf', ["name" => $name, "nis" => $nis, "saw" => $vsaw_hasils, "wp" => $vwp_hasils, "topsis" => $topsis_hasils, "timestamp" => $timestamp]);
        return $pdf->download($name . ' - ' . $nis . '.pdf');
    }

    public function reset_spk_admin(Request $request)
    {
        // Decrement atau kurangi peminat pada tabel peminatan
        $hasil = VSawHasil::where('user_id', $request->id)
                ->whereNotNull('hasil')
                ->orderBy('hasil', 'desc')
                ->get();

        for($i = 0; $i < 5; $i++) {
            if(isset($hasil[$i])) {
                $pkl_place = PklPlace::where('title', $hasil[$i]->title)->first();
                if ($pkl_place) {
                    Peminatan::where('pkl_place_id', $pkl_place->id)->decrement('peminat');
                }
            }
        }

        // Reset Bobot pada tabel user
        User::where('id', $request->id)->update([
            "w1" => 0,
            "w2" => 0,
            "w3" => 0,
            "w4" => 0,
            "w5" => 0,
        ]);

        // Hapus Alternatif pada tabel alternatif
        Alternatif::where('user_id', $request->id)->delete();

        return redirect()->back()->with('message', 'Berhasil Menghapus Hasil');
    }

    // Verifikasi pengguna
    public function verifikasi_pengguna()
    {
        $data_siswa = User::where('verifikasi_siswa', 'tolak')->get();

        return view('admin.verifikasi_pengguna', ['data_siswa' => $data_siswa]);
    }

    public function acc_user(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $user->update([
            "verifikasi_siswa" => 'terima'
        ]);
        return redirect()->back()->with('message', 'Berhasil melakukan verifikasi pengguna');
    }

    public function decline_user(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $user->delete();
        return redirect()->back()->with('message', 'Berhasil menolak dan menghapus verifikasi pengguna');
    }

    // Nilai Bobot
    public function bobot_view()
    {
        return view('admin.nilai_bobot');
    }

    // Nilai Alternatif
    public function alternatif_view()
    {
        return view('admin.nilai_alternatif');
    }

    public function perankingan_view()
    {
        return view('admin.nilai_perankingan');
    }
}
