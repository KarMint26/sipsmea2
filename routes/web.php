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
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    Route::post('/student', [StudentController::class, 'send_pkl'])->name('student.send_pkl');

    // Nilai Alternatif
    Route::get('/student/alternatif', [StudentController::class, 'alternatif_view'])->name('student.alternatif_view');
    Route::post('/student/alternatif', [StudentController::class, 'alternatif_post'])->name('student.alternatif_post');
    Route::post('/student/alternatif_back', [StudentController::class, 'alternatif_back'])->name('student.alternatif_back');

    // Bobot
    Route::get('/student/bobot', [StudentController::class, 'bobot_view'])->name('student.bobot_view');

    // Hasil SPK
    Route::get('/student/result', [StudentController::class, 'result_view'])->name('student.result_view');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard.index');
    Route::get('/admin/tempat_pkl', [AdminController::class, 'tempat_pkl'])->name('dashboard.tempat_pkl');
    Route::get('/admin/manajemen_pengguna', [AdminController::class, 'manajemen_pengguna'])->name('dashboard.manajemen_pengguna');
    Route::get('/generate-barcode', [AdminController::class, 'barcode_generator'])->name('barcode_generator');
});
