<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function forgot_password()
    {
        return view('auth.forgot_password');
    }

    public function forgot_password_act(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.exists' => 'Email belum terdaftar'
        ]);

        // Buat token reset password
        $token = Str::random(60);

        PasswordResetToken::updateOrCreate(
            [
            'email' => $validated['email'],
        ],
            [
            'email' => $validated['email'],
            'token' => $token,
            'created_at' => now()
        ]
        );

        // Kirim email reset password
        Mail::to($request->email)->send(new ResetPasswordMail($token));

        return redirect()->route('forgot_password')->with('success', 'Kami telah mengirimkan link reset password ke email anda');
    }

    public function reset_password(Request $request, $token)
    {
        $tokens = PasswordResetToken::where('token', $token)->first();

        if(!$tokens){
            return redirect()->route('login')->withErrors('Token Tidak Valid');
        }

        return view('auth.reset_password', ['token' => $token]);
    }

    public function reset_password_act(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required',
        ], [
            'password.required' => 'password wajib diisi'
        ]);

        $token = PasswordResetToken::where('token', $request->token)->first();

        if(!$token){
            return redirect()->route('login')->withErrors('Token Tidak Valid');
        }

        $user = User::where('email', $token->email)->first();

        if(!$user){
            return redirect()->route('login')->withErrors('Email Belum Terdaftar');
        }

        $user->update([
            'password' => Hash::make($validated['password']),
            'pwd_nohash' => $validated['password']
        ]);

        $token->delete();

        return redirect()->route('login')->with('message', 'Password berhasil di reset');
    }
}
