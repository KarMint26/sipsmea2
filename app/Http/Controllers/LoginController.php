<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login_view()
    {
        return view('auth.login');
    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function generateRandomPassword()
    {
        $randomPassword = Str::random(10) . mt_rand(100, 999) . Str::random(3) . mt_rand(100, 999);
        return $randomPassword;
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
        $userDetail = User::where('email', $request->email)->first();

        if ($userDetail->verifikasi_siswa != 'terima') {
            return redirect('/login')->with('warn', 'Belum Dapat Login, Akun Belum Di Verifikasi Oleh Operator');
        }

        if ($userDetail->status != 'aktif') {
            return redirect('/login')->with('error', 'Gagal login, akun tidak aktif');
        }

        if(Auth::attempt($credentials)) {
            return redirect('/')->with('message', 'Login Berhasil');
        } else {
            return redirect('/login')->withErrors('Email dan password yang dimasukkan tidak sesuai')->withInput();
        }
    }
    public function student_login(Request $request)
    {
        try {
            $userDetail = User::where('email', Crypt::decryptString($request->email))->first();

            if ($userDetail == null) {
                return redirect('/login')->with('error', 'Gagal login, akun belum terdaftar');
            }

            if ($userDetail->verifikasi_siswa != 'terima') {
                return redirect('/login')->with('warn', 'Belum dapat login, akun belum diverifikasi oleh operator');
            }

            if ($userDetail->status != 'aktif') {
                return redirect('/login')->with('error', 'Gagal login, akun tidak aktif');
            }

            if($request->role != 'siswa') {
                return redirect('/')->with('error', 'Login QR Code Hanya Untuk Siswa');
            }

            // Pengecekan login dengan Google atau Facebook
            if ($request->has('google_id')) {
                $userGoogleExist = User::where('google_id', $request->google_id)->first();
                if ($userGoogleExist) {
                    Auth::login($userGoogleExist);
                    return redirect('/')->with('message', 'Login Berhasil');
                }
            }

            if ($request->has('facebook_id')) {
                $userFacebookExist = User::where('facebook_id', $request->facebook_id)->first();
                if ($userFacebookExist) {
                    Auth::login($userFacebookExist);
                    return redirect('/')->with('message', 'Login Berhasil');
                }
            }

            $credentials = [
                'email' => Crypt::decryptString($request->email),
                'password' => Crypt::decryptString($request->password),
            ];

            if(Auth::attempt($credentials)) {
                return redirect('/')->with('message', 'Login Berhasil');
            } else {
                return redirect('/')->with('error', 'Login Gagal');
            }
        } catch (DecryptException $e) {
            return redirect()->route('login')->with('error', 'Gagal login karena mencoba manipulasi url login');
        }
    }

    // Register with verify email
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
        if (Auth::user()->hasVerifiedEmail() && Auth::user()->verifikasi_siswa != 'tolak') {
            return redirect()->route('index');
        }

        return view('auth.verify_email');
    }

    public function verify(EmailVerificationRequest $request, $id, $hash)
    {
        $user = User::findOrFail($id);

        if ($user->hasVerifiedEmail() && $user->verifikasi_siswa != 'tolak') {
            Auth::login($user);
            return redirect()->route('index')->with('message', 'Login berhasil');
        }

        $request->fulfill();

        Auth::logout();

        if ($user->hasVerifiedEmail() && $user->verifikasi_email != 'tolak') {
            Auth::login($user);
            return redirect()->route('index')->with('message', 'Login berhasil');
        }

        return redirect()->route('login')->with('message', 'Akun telah aktif, tunggu verifikasi akun oleh operator');
    }

    public function resend_verification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return redirect()->back()->with('message', 'Berhasil Mengirimkan Email Verifikasi');
    }

    // Google Login
    public function google_redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function google_callback()
    {
        $googleUser = Socialite::driver('google')->user();
        $email = $googleUser->getEmail();

        // Cek apakah email sudah terdaftar tetapi tidak memiliki google_id
        $userWithEmail = User::where('email', $email)->first();

        if ($userWithEmail && !$userWithEmail->google_id) {
            // Jika email sudah terdaftar tapi tidak punya google_id, arahkan ke halaman login
            return redirect()->route('login')->withErrors('Email sudah terdaftar. Silakan login google dengan email yang lain.');
        }

        // Lanjutkan dengan proses login atau pembuatan akun
        $userExist = User::where('google_id', $googleUser->getId())->first();

        if (!$userExist) {
            $user = User::create([
                'name' => $googleUser->getName(),
                'nisn' => mt_rand(10000, 99999),
                'email' => $email,
                'password' => bcrypt($this->generateRandomPassword()),
                'pwd_nohash' => $this->generateRandomPassword(),
                'google_id' => $googleUser->getId(),
                'email_verified_at' => now()
            ]);

            return redirect()->route('login')->with('message', 'Akun telah aktif, tunggu verifikasi akun dari operator');
        }

        if($userExist->verifikasi_siswa != 'tolak'){
            Auth::login($userExist);
            return redirect()->route('index')->with('message', 'Login berhasil');
        }
        return redirect()->route('login')->with('message', 'Akun telah aktif, tunggu verifikasi akun dari operator');
    }

    // Facebook Login
    public function facebook_redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebook_callback()
    {
        $facebookUser = Socialite::driver('facebook')->user();
        $email = $facebookUser->getEmail();

        // Cek apakah email sudah terdaftar tetapi tidak memiliki facebook_id
        $userWithEmail = User::where('email', $email)->first();

        if ($userWithEmail && !$userWithEmail->facebook_id) {
            // Jika email sudah terdaftar tapi tidak punya facebook_id, arahkan ke halaman login
            return redirect()->route('login')->withErrors('Email sudah terdaftar. Silakan login facebook dengan email yang lain.');
        }

        // Lanjutkan dengan proses login atau pembuatan akun
        $userExist = User::where('facebook_id', $facebookUser->getId())->first();

        if (!$userExist) {
            $user = User::create([
                'name' => $facebookUser->getName(),
                'nisn' => mt_rand(10000, 99999),
                'email' => $email,
                'password' => bcrypt($this->generateRandomPassword()),
                'pwd_nohash' => $this->generateRandomPassword(),
                'facebook_id' => $facebookUser->getId(),
                'email_verified_at' => now()
            ]);

            return redirect()->route('login')->with('message', 'Akun telah aktif, tunggu verifikasi akun dari operator');
        }

        if($userExist->verifikasi_siswa != 'tolak'){
            Auth::login($userExist);
            return redirect()->route('index')->with('message', 'Login berhasil');
        }
        return redirect()->route('login')->with('message', 'Akun telah aktif, tunggu verifikasi akun dari operator');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
