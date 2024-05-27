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
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    // Peminatan
    public function index()
    {
        // proteksi halaman jika sudah ada hasil
        $vsaw_hasils = VSawHasil::where('user_id', Auth::user()->id)
                        ->whereNotNull('hasil')
                        ->get();

        if (!$vsaw_hasils->isEmpty()) {
            return redirect()->route('student.result_view')->with('message', 'Berhasil menampilkan hasil perhitungan SPK');
        }

        // proteksi halaman jika sudah ada jarak
        $alt_bobot = Alternatif::where('user_id', Auth::user()->id)
                ->where('jarak', '!=', 0)
                ->get();

        if (!$alt_bobot->isEmpty()) {
            return redirect()->route('student.bobot_view')->with('message', 'Anda tidak dapat kembali ke halaman sebelumnya');
        }

        // proteksi halaman jika sudah ada alternatif
        $alt_value = Alternatif::where('user_id', Auth::user()->id)->get();

        if(!$alt_value->isEmpty()) {
            return redirect()->route('student.alternatif_view')->with('message', 'Anda tidak dapat kembali ke halaman sebelumnya');
        }

        $pkl_places = PklPlace::all()->where('status', 'aktif');
        return view('siswa.siswa', ["pkl_places" => $pkl_places]);
    }

    public function send_pkl(Request $request)
    {
        $data = $request->cb;

        if (!$request->cb) {
            return redirect()->back()->with('message', 'Harus memilih 5 tempat PKL');
        }

        if (count($data) != 5) {
            return redirect()->back()->with('message', 'Harus memilih 5 tempat PKL');
        }

        foreach ($data as $value) {
            Peminatan::where('pkl_place_id', $value)->increment('peminat');
        }

        $peminatan = Peminatan::all()->whereIn('pkl_place_id', $data);

        foreach ($peminatan as $value) {
            Alternatif::create([
                "jarak" => 0,
                "current_peminat" => $value->peminat,
                "peminatan_id" => $value->id,
                "user_id" => Auth::user()->id
            ]);
        }

        return redirect()->route('student.alternatif_view')->with('success', 'Berhasil memilih Tempat PKL');
    }

    // Alternatif
    public function alternatif_view(Request $request)
    {
        // proteksi halaman jika sudah ada hasil
        $vsaw_hasils = VSawHasil::where('user_id', Auth::user()->id)
                        ->whereNotNull('hasil')
                        ->get();

        if (!$vsaw_hasils->isEmpty()) {
            return redirect()->route('student.result_view')->with('message', 'Berhasil menampilkan hasil perhitungan SPK');
        }

        // proteksi halaman jika sudah ada jarak
        $alt_bobot = Alternatif::where('user_id', Auth::user()->id)
                ->where('jarak', '!=', 0)
                ->get();

        if (!$alt_bobot->isEmpty()) {
            return redirect()->route('student.bobot_view')->with('message', 'Anda tidak dapat kembali ke halaman sebelumnya');
        }

        // proteksi halaman jika belum ada alternatif
        $alt_value = Alternatif::where('user_id', Auth::user()->id)->get();

        if($alt_value->isEmpty()) {
            return redirect()->route('student.index')->with('message', 'Harus memilih 5 tempat PKL');
        }

        $alternatif = Alternatif::all()->whereIn('user_id', Auth::user()->id);

        return view('siswa.alternatif', ["alternatif" => $alternatif]);
    }

    public function alternatif_post(Request $request)
    {
        $data_alternatif = Alternatif::where('user_id', Auth::user()->id)->get();
        $rules = [];
        $messages = [];

        foreach ($request->alt as $key => $value) {
            $rules["alt.{$key}"] = 'required|numeric';
            $messages["alt.{$key}.required"] = "Jarak wajib diisi";
            $messages["alt.{$key}.numeric"] = "Jarak harus berupa angka";
        }

        $validated = $request->validate($rules, $messages);

        for ($i = 0; $i < 5; $i++) {
            $data_alternatif[$i]->update([
                'jarak' => $validated['alt'][$i]
            ]);
        }

        return redirect()->route('student.bobot_view')->with('success', 'Berhasil mengisi jarak');
    }

    public function alternatif_back(Request $request)
    {
        $data_cb = Alternatif::all()->whereIn('user_id', Auth::user()->id);

        // kurangi peminat tempat pkl
        foreach ($data_cb as $value) {
            Peminatan::where('pkl_place_id', $value->peminatan->pkl_place_id)->decrement('peminat');
        }

        // delete tempat pkl
        Alternatif::where('user_id', Auth::user()->id)->delete();

        return redirect()->route('student.index');
    }

    // Bobot
    public function bobot_view(Request $request)
    {
        // proteksi halaman jika sudah ada hasil
        $vsaw_hasils = VSawHasil::where('user_id', Auth::user()->id)
                        ->whereNotNull('hasil')
                        ->get();

        if (!$vsaw_hasils->isEmpty()) {
            return redirect()->route('student.result_view')->with('message', 'Berhasil menampilkan hasil perhitungan SPK');
        }

        // proteksi halaman jika belum ada jarak
        $alt_bobot = Alternatif::where('user_id', Auth::user()->id)
                ->where('jarak', '!=', 0)
                ->get();

        if ($alt_bobot->isEmpty()) {
            return redirect()->route('student.alternatif_view')->with('message', 'Anda tidak dapat mengakses halaman bobot');
        }

        return view('siswa.bobot');
    }

    public function bobot_post(Request $request)
    {
        $rules = [
            "w1" => "required",
            "w2" => "required",
            "w3" => "required",
            "w4" => "required",
            "w5" => "required"
        ];
        $validated = $request->validate($rules, [
            "w1.required" => "Bobot jarak wajib diisi",
            "w2.required" => "Bobot rating wajib diisi",
            "w3.required" => "Bobot daya tampung wajib diisi",
            "w4.required" => "Bobot akses jalan wajib diisi",
            "w5.required" => "Bobot peminat wajib diisi",
        ]);

        $newData = User::where('id', Auth::user()->id)->update($validated);
        if($newData) {
            return redirect()->route('student.result_view')->with('message', 'Berhasil menampilkan hasil perhitungan SPK');
        }
    }

    // Hasil SAW dan WP
    public function result_view(Request $request)
    {
        // proteksi halaman jika belum ada hasil
        $vsaw_hasils = VSawHasil::where('user_id', Auth::user()->id)
                        ->whereNotNull('hasil')
                        ->orderBy('hasil', 'desc')
                        ->get();

        $vwp_hasils = VWpHasil::where('id', Auth::user()->id)
                        ->whereNotNull('hasil')
                        ->orderBy('hasil', 'desc')
                        ->get();

        $topsis_hasils = VTopsisHasil::where('user_id', Auth::user()->id)
                        ->whereNotNull('hasil')
                        ->orderBy('hasil', 'desc')
                        ->get();

        $timestamp = User::where('id', Auth::user()->id)->first()->updated_at;

        if ($vsaw_hasils->isEmpty()) {
            return redirect()->back()->with('message', 'Hasil belum dapat dimunculkan');
        }

        return view('siswa.result', ["saw" => $vsaw_hasils, "wp" => $vwp_hasils, "topsis" => $topsis_hasils, "timestamp" => $timestamp]);
    }

    public function download_pdf(Request $request)
    {
        $vsaw_hasils = VSawHasil::where('user_id', Auth::user()->id)
                        ->whereNotNull('hasil')
                        ->orderBy('hasil', 'desc')
                        ->get();

        $vwp_hasils = VWpHasil::where('id', Auth::user()->id)
                        ->whereNotNull('hasil')
                        ->orderBy('hasil', 'desc')
                        ->get();

        $topsis_hasils = VTopsisHasil::where('user_id', Auth::user()->id)
                        ->whereNotNull('hasil')
                        ->orderBy('hasil', 'desc')
                        ->get();

        $name = Auth::user()->name;
        $nis = Auth::user()->nisn;
        $timestamp = User::where('id', Auth::user()->id)->first()->updated_at;

        $pdf = Pdf::loadView('siswa.result_pdf', ["name" => $name, "nis" => $nis, "saw" => $vsaw_hasils, "wp" => $vwp_hasils, "topsis" => $topsis_hasils, "timestamp" => $timestamp]);
        return $pdf->download($name . ' - ' . $nis . '.pdf');
    }

    public function reset_spk()
    {
        // Decrement atau kurangi peminat pada tabel peminatan
        $hasil = VSawHasil::where('user_id', Auth::user()->id)
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
        User::where('id', Auth::user()->id)->update([
            "w1" => 0,
            "w2" => 0,
            "w3" => 0,
            "w4" => 0,
            "w5" => 0,
        ]);

        // Hapus Alternatif pada tabel alternatif
        Alternatif::where('user_id', Auth::user()->id)->delete();

        return redirect()->route('student.index')->with('success', 'Berhasil Me-reset Hasil');
    }

    // Edit Profile
    public function edit_profile_view()
    {
        $user_detail = User::where('id', Auth::user()->id)->first();
        return view('siswa.edit_profile', ['user' => $user_detail]);
    }

    public function edit_profile(Request $request)
    {
        $rules = [
            "nama_siswa" => "required|min:3",
            "nisn_siswa" => "required|numeric|digits_between:5,10",
        ];
        $validated = $request->validate($rules, [
            "nama_siswa.required" => "Nama Wajib Diisi",
            "nama_siswa.min" => "Nama Minimal Terdiri 3 Character",
            "nisn_siswa.required" => "NISN Wajib Diisi",
            "nisn_siswa.numeric" => "NISN harus berupa angka",
            "nisn_siswa.digits_between" => "NISN harus terdiri dari minimal 5 digit angka",
        ]);

        $user_update = User::where('id', Auth::user()->id)->update([
            "name" => $validated['nama_siswa'],
            "nisn" => $validated['nisn_siswa']
        ]);

        if($user_update) {
            return redirect()->back()->with('message', 'Berhasil Mengubah Profile');
        }
        return redirect()->back()->with('error', 'Gagal Mengubah Profile');
    }
}
