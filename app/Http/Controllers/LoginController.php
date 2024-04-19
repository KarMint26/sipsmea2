<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if($request->username != 'admin' && $request->password != 'glr413fv37'){
            return redirect('/')->with('error', 'Hanya Admin Yang Dapat Login');
        }

        if(Auth::attempt($credentials)) {
            return redirect('/')->with('message', 'Login Berhasil');
        } else {
            return redirect('/login')->withErrors('Username dan password yang dimasukkan tidak sesuai')->withInput();
        }
    }
    public function student_login(Request $request)
    {
        // https://sipsmea.techtitans.id/student-login?username=16517&password=hgu7lr9z&role=siswa
        // http://127.0.0.1/student-login?username=16517&password=hgu7lr9z&role=siswa
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if($request->role != 'siswa'){
            return redirect('/')->with('error', 'Login QR Code Hanya Untuk Siswa');
        }

        if(Auth::attempt($credentials)) {
            return redirect('/')->with('message', 'Login Berhasil');
        } else {
            return redirect('/')->with('error', 'Login Gagal');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
