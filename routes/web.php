<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RouteController::class, 'index'])->name('index');
Route::get('/home', function () {
    return redirect('/');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login_auth');
    Route::get('/student-login', [LoginController::class, 'student_login'])->name('student_login');
});

Route::middleware('auth')->group(function () {
    Route::get('/generate-barcode', [AdminController::class, 'barcode_generator'])->name('barcode_generator');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::prefix('/student')->group(function () {
        // Memilih Tempat PKL
        Route::get('/choose-pkl-places', [StudentController::class, 'index'])->name('student.index');
        Route::post('/choose-pkl-places', [StudentController::class, 'send_pkl'])->name('student.send_pkl');

        // Nilai Alternatif
        Route::get('/alternatif', [StudentController::class, 'alternatif_view'])->name('student.alternatif_view');
        Route::post('/alternatif', [StudentController::class, 'alternatif_post'])->name('student.alternatif_post');
        Route::post('/alternatif-back', [StudentController::class, 'alternatif_back'])->name('student.alternatif_back');

        // Bobot
        Route::get('/bobot', [StudentController::class, 'bobot_view'])->name('student.bobot_view');
        Route::post('/bobot', [StudentController::class, 'bobot_post'])->name('student.bobot_post');

        // Hasil SPK
        Route::get('/result', [StudentController::class, 'result_view'])->name('student.result_view');
        Route::get('/download-pdf', [StudentController::class, 'download_pdf'])->name('download_pdf');

        // Reset SPK
        Route::post('/reset-spk', [StudentController::class, 'reset_spk'])->name('student.reset_spk');

        // Edit Profile
        Route::get('/edit-profile', [StudentController::class, 'edit_profile_view'])->name('student.edit_profile');
        Route::post('/edit-profile', [StudentController::class, 'edit_profile'])->name('student.edit_profile_post');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard.index');
        Route::get('/tempat-pkl', [AdminController::class, 'tempat_pkl'])->name('dashboard.tempat_pkl');
        Route::get('/manajemen-pengguna', [AdminController::class, 'manajemen_pengguna'])->name('dashboard.manajemen_pengguna');
        Route::get('/hasil-spk', [AdminController::class, 'hasil_spk'])->name('dashboard.hasil_spk');
        Route::get('/download-pdf-admin', [StudentController::class, 'download_pdf_admin'])->name('download_pdf_admin');
    });
});
