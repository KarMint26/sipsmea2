<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login_view()
    {
        return view('pages.login');
    }
    public function register_view()
    {
        return view('pages.register');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)) {
            return redirect('/')->with('message', 'Login Berhasil');
        } else {
            return redirect('/login')->withErrors('Email dan password yang dimasukkan tidak sesuai')->withInput();
        }
    }
    public function student_login(Request $request)
    {
        // https://sipsmea.techtitans.id/student-login?email=aditya@gmail.com&password=hgu7lr9z&role=siswa - Tidak Aktif
        // http://127.0.0.1:8000/student-login?email=aditya@gmail.com&password=hgu7lr9z&role=siswa - Tidak Aktif

        // https://sipsmea.techtitans.id/student-login?email=aditya@gmail.com&password=hgu7lr9z&role=siswa - Aktif
        // http://127.0.0.1:8000/student-login?email=aditya@gmail.com&password=07VtQ2ebdY509Hbv262&role=siswa - Aktif

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $userDetail = User::where('email', $request->email)->first();

        if ($userDetail == null) {
            return redirect('/')->with('error', 'Gagal login, akun belum terdaftar');
        }

        if ($userDetail->status != 'aktif') {
            return redirect('/')->with('error', 'Gagal login, akun tidak aktif');
        }

        if($request->role != 'siswa') {
            return redirect('/')->with('error', 'Login QR Code Hanya Untuk Siswa');
        }

        if(Auth::attempt($credentials)) {
            return redirect('/')->with('message', 'Login Berhasil');
        } else {
            return redirect('/')->with('error', 'Login Gagal');
        }
    }
    public function register(Request $request)
    {
        // Validasi data input dari pengguna
        $validated = $request->validate([
            'name' => 'required',
            'nisn' => 'required|numeric',
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'name.required' => 'Nama wajib diisi',
            'nisn.required' => 'NISN wajib diisi',
            'nisn.numeric' => 'NISN harus dalam bentuk angka',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi'
        ]);

        // Cek apakah pengguna dengan email yang sama sudah terdaftar
        if (User::where('email', $validated['email'])->exists()) {
            return redirect()->back()->withErrors(['email' => 'Email sudah terdaftar']);
        }

        // Buat pengguna baru
        $user = User::create([
            'name' => $validated['name'],
            'nisn' => $validated['nisn'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'pwd_nohash' => $validated['password'],
            'role' => 'siswa',
        ]);

        // Kirim event bahwa pengguna baru telah terdaftar
        event(new Registered($user));

        // Login pengguna baru
        auth()->login($user);

        // Redirect ke halaman notifikasi verifikasi email
        return redirect()->route('verification.notice')->with('message', 'Akun berhasil dibuat, silahkan verifikasi Email anda');
    }


    public function notice()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('index');
        }

        return view('pages.verify_email');
    }

    public function verify(EmailVerificationRequest $request, $id, $hash)
    {
        $user = User::findOrFail($id);

        if ($user->hasVerifiedEmail()) {
            Auth::login($user);
            return redirect()->route('index');
        }

        $request->fulfill();

        if ($user->hasVerifiedEmail()) {
            Auth::login($user);
            return redirect()->route('index');
        }

        return redirect()->route('login')->with('message', 'Email berhasil di verifikasi, Akun telah aktif');
    }

    public function resend_verification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return redirect()->back()->with('message', 'Berhasil Mengirimkan Email Verifikasi');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
