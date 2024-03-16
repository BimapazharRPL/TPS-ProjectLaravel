<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PembayaranController;


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
// login & sign up
Route::controller(AuthController::class)->group(function() {
    //register form 
    Route::get('/daftar', 'daftar')->name('auth.daftar');
    //store register
    Route::post('/store', 'store')->name('auth.store');
    //login form
    Route::get('/login', 'login')->name('auth.login');
    //auth proses
    Route::post('/auth', 'auth')->name('auth.authentication');
    //logout
    Route::post('/logout', 'logout')->name('auth.logout');
    //dashboard page
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});
// admin 
Route::get('nasabah', [UserController::class, 'nasabah'])->middleware('isLogin');
Route::get('data-admin', [UserController::class, 'admin']);
Route::get('input-data', [StatistikController::class, 'input_data']);
Route::post('input-data', [StatistikController::class, 'store'])->name('statistik.store');
Route::post('simpan-data', [StatistikController::class, 'simpan'])->name('statistik.simpan');
Route::post('masuk-data', [StatistikController::class, 'storey'])->name('statistik.storey');
Route::post('simpan_data', [StatistikController::class, 'simpanS'])->name('statistik.simpanS');
Route::get('simpan_data', [StatistikController::class, 'edit'])->name('statistik.edit');
Route::resource('qwertyu', AnggotaController::class);
// Route::get('qwertyu/confirm-destroy/{qwertyu}', [AnggotaController::class, 'confirmDestroy'])
//     ->name('qwertyu.confirmDestroy');
// Route::delete('qwertyu/confirm-destroy/{qwertyu}', [AnggotaController::class, 'confirmDestroy'])->name('qwertyu.confirmDestroy');

Route::resource('produk', ProdukController::class);
Route::resource('kegiatan', KegiatanController::class);
Route::get('pembayaranq', [PembayaranController::class, 'admin']);
Route::get('absensi', function () {
    return view('masuk.admin.absen');
});
Route::get('Admin', function () {
    return view('masuk.Admin.kontak');
});
// Route::put('/masuk-data/{id}', [StatistikController::class, 'update'])->name('statistik.update');

// User Nasabah
Route::get('Pembayaran', [PembayaranController::class, 'index'])->middleware('isLogin');
Route::get('/pembayaran/create', [PembayaranController::class, 'create'])->name('Pembayaran.create')->middleware('isLogin');
Route::post('/pembayaran/store', [PembayaranController::class, 'store'])->name('Pembayaran.store')->middleware('isLogin');
Route::get('/pembayaran/detail/{id}', [PembayaranController::class, 'detail'])->name('Pembayaran.detail')->middleware('isLogin');

Route::get('home', function () {
    return view('auth.dashboard');
})->middleware('isLogin');
Route::get('peta', function () {
    return view('auth.dashboard');
})->name('peta')->middleware('isLogin');
Route::get('Peraturan', function () {
    return view('masuk.peraturan');
})->middleware('isLogin');
Route::get('Statistik', function () {
    return view('masuk.statistik');
})->middleware('isLogin');
Route::get('Kontak-kami', function () {
    return view('masuk.Kontak-kami');
})->middleware('isLogin');

// User Asing
Route::get('/', function () {
    return view('utama');
});
Route::get('kontak-kami', function () {
    return view('Kontak-kami');
});
Route::get('beranda', function () {
    return view('utama');
});
Route::get('petaa', function () {
    return view('utama');
})->name('petaa');
Route::get('peraturan', function () {
    return view('peraturan');
});
Route::get('statistik', function () {
    return view('statistik');
});

 // untuk Petugas
Route::get('absen_karyawan_TPS', [AnggotaController::class, 'showForm']);
Route::post('dataAbesensi', [AnggotaController::class, 'storeForm'])->name('qwertyu.storeForm');
