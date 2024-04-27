<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Peminatan;
use App\Models\PklPlace;
use App\Models\VAlternatif;
use App\Models\VBobot;
use App\Models\VSawHasil;
use App\Models\VWpHasil;
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
                        ->get(); // atau first() jika Anda hanya ingin satu record

        if (!$vsaw_hasils->isEmpty()) {
            return redirect()->route('student.result_view')->with('message', 'Anda tidak dapat kembali ke halaman sebelumnya');
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

        if(!$alt_value->isEmpty()){
            return redirect()->route('student.alternatif_view')->with('message', 'Anda tidak dapat kembali ke halaman sebelumnya');
        }

        $pkl_places = PklPlace::all()->where('status', 'aktif');
        return view('siswa.siswa', ["pkl_places" => $pkl_places]);
    }

    public function send_pkl(Request $request)
    {
        $data = $request->cb;

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

        return redirect()->route('student.alternatif_view', ["data_cb" => $data]);
    }

    // Alternatif
    public function alternatif_view(Request $request)
    {
        // proteksi halaman jika sudah ada hasil
        $vsaw_hasils = VSawHasil::where('user_id', Auth::user()->id)
                        ->whereNotNull('hasil')
                        ->get(); // atau first() jika Anda hanya ingin satu record

        if (!$vsaw_hasils->isEmpty()) {
            return redirect()->route('student.result_view')->with('message', 'Anda tidak dapat kembali ke halaman sebelumnya');
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

        if($alt_value->isEmpty()){
            return redirect()->route('student.index')->with('message', 'Anda tidak dapat mengakses halaman selanjutnya');
        }

        $peminatan = Peminatan::all()->whereIn('pkl_place_id', $request->data_cb);

        return view('siswa.alternatif', ["peminatan" => $peminatan, "data_cb" => $request->data_cb]);
    }

    public function alternatif_post(Request $request)
    {

    }

    public function alternatif_back(Request $request)
    {
        $data_cb = $request->data_cb;

        // kurangi peminat tempat pkl
        foreach ($data_cb as $value) {
            Peminatan::where('pkl_place_id', $value)->decrement('peminat');
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
                        ->get(); // atau first() jika Anda hanya ingin satu record

        if (!$vsaw_hasils->isEmpty()) {
            return redirect()->route('student.result_view')->with('message', 'Anda tidak dapat kembali ke halaman sebelumnya');
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

    // Hasil SAW dan WP
    public function result_view(Request $request)
    {
        // proteksi halaman jika belum ada hasil
        $vsaw_hasils = VSawHasil::where('user_id', Auth::user()->id)
                        ->whereNotNull('hasil')
                        ->get(); // atau first() jika Anda hanya ingin satu record

        if ($vsaw_hasils->isEmpty()) {
            return redirect()->back()->with('message', 'Hasil belum dapat dimunculkan');
        }

        return view('siswa.result');
    }

    public function redirect_bobot()
    {
        // proteksi halaman dari /student/bobot
        $bobot_user = VBobot::where('id', Auth::user()->id)
                    ->where(function ($query) {
                        $query->whereNull('w1')
                              ->orWhereNull('w2')
                              ->orWhereNull('w3')
                              ->orWhereNull('w4')
                              ->orWhereNull('w5');
                    })
                    ->first();

        if ($bobot_user) {
            return redirect()->route('student.bobot_view')->with('message', 'anda tidak dapat kembali ke halaman sebelumnya selain bobot');
        }
    }
}
