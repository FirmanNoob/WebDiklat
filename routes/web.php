<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FillPDFController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SesiController;

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

Route::get('/buat', [FillPDFController::class, 'process']);
// Route::get('/', function () {
//     return view('tampilanDepan')->name('tampilanDepan');
// });

Route::get('/', [FrontController::class, 'index'])->name('front');
Route::get('/pelatihan/{id}/detail', [FrontController::class, 'pelatihan_detail'])->name('pelatihan-detail');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::view('/pelatihan', 'pelatihan');
Route::view('/panduan', 'panduan')->name('panduan');
Route::view('/registrasi', 'regis')->name('registrasi');
Route::view('/contact', 'contact')->name('contact');


// Route::view('/login', 'login');
Route::get('/login', [SesiController::class, 'index'])->name('login');
Route::post('/login-proses', [SesiController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [SesiController::class, 'logout'])->name('logout');

Route::get('/register', [SesiController::class, 'register'])->name('register');
Route::post('/register-proses', [SesiController::class, 'register_proses'])->name('register-proses');
// Route::prefix('admin')->middleware('auth')->group(function () {
// });
Route::group(['middleware' => ['auth', 'CekRole:operator']], function () {
    Route::get('/sertifikat', [DashboardController::class, 'sertifikat'])->name('sertifikat');
});
Route::group(['middleware' => ['auth', 'CekRole:operator,peserta']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pelatihan', [DashboardController::class, 'pelatihan'])->name('pelatihan');
    Route::get('/pelatihan/tambah', [DashboardController::class, 'pelatihan_tambah'])->name('pelatihan.tambah');
    Route::post('/pelatihan/tambah-proses', [DashboardController::class, 'pelatihan_tambah_proses'])->name('pelatihan.tambah-proses');
    Route::get('/pelatihan/{id}/update', [DashboardController::class, 'pelatihan_update'])->name('pelatihan.update');
    Route::post('/pelatihan/{id}/update-proses', [DashboardController::class, 'pelatihan_update_proses'])->name('pelatihan.update-proses');
});
