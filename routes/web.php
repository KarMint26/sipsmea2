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
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard.index');
    Route::get('/admin/tempat_pkl', [AdminController::class, 'tempat_pkl'])->name('dashboard.tempat_pkl');
    Route::get('/admin/manajemen_pengguna', [AdminController::class, 'manajemen_pengguna'])->name('dashboard.manajemen_pengguna');
    Route::get('/generate-barcode', [AdminController::class, 'barcode_generator'])->name('barcode_generator');
});
