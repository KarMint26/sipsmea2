<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Peminatan;
use App\Models\PklPlace;
use App\Models\VSawHasil;
use App\Models\VWpHasil;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    // Peminatan
    public function index()
    {
        $pkl_places = PklPlace::all()->where('status', 'aktif');
        return view('siswa.siswa', ["pkl_places" => $pkl_places]);
    }

    public function send_pkl(Request $request)
    {
        // Jika user sudah mengisi kriteria jarak dan keluar hasil SAW dan WP maka redirect ke halaman bobot
        if(Auth::user()->alternatifs()->whereNotNull('jarak')->exists() || VWpHasil::where('id', Auth::user()->id)->exists() || VSawHasil::where('user_id', Auth::user()->id)->exists()){
            return redirect()->route('student.bobot_view')->with('message', 'anda tidak dapat kembali ke halaman sebelumnya');
        }
        // $data = $request->cb;

        // if (count($data) != 5) {
        //     return redirect()->back()->with('message', 'Harus memilih 5 tempat PKL');
        // }

        // foreach ($data as $value) {
        //     Peminatan::where('pkl_place_id', $value)->increment('peminat');
        // }
        // return redirect()->route('student.alternatif_view', ["data_cb" => $data]);

        return redirect()->route('student.alternatif_view');
    }

    // Alternatif
    public function alternatif_view(Request $request)
    {
        // Jika user sudah mengisi kriteria jarak dan keluar hasil SAW dan WP maka redirect ke halaman bobot
        if(Auth::user()->alternatifs()->whereNotNull('jarak')->exists() || VWpHasil::where('id', Auth::user()->id)->exists() || VSawHasil::where('user_id', Auth::user()->id)->exists()){
            return redirect()->route('student.bobot_view')->with('message', 'anda tidak dapat kembali ke halaman sebelumnya');
        }
        // return view('siswa.alternatif', ["peminatan" => Peminatan::all(), "data_cb" => $request->data_cb]);

        return view('siswa.alternatif');
    }

    public function alternatif_post(Request $request)
    {

    }

    public function alternatif_back(Request $request)
    {
        $data_cb = $request->data_cb;
        foreach ($data_cb as $value) {
            Peminatan::where('pkl_place_id', $value)->decrement('peminat');
        }

        return redirect()->route('student.send_pkl');
    }

    // Bobot
    public function bobot_view(Request $request)
    {
        // Jika user sudah keluar hasil SAW dan WP maka redirect ke halaman bobot
        if(VWpHasil::where('id', Auth::user()->id)->exists() || VSawHasil::where('user_id', Auth::user()->id)->exists()){
            return redirect()->route('student.result_view')->with('message', 'anda tidak dapat kembali ke halaman sebelumnya');
        }

        return view('siswa.bobot');
    }

    // Hasil SAW dan WP
    public function result_view(Request $request)
    {
        return view('siswa.result');
    }
}
