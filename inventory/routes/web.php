<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DataBarangMasuk;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanBarangMasuk;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/err-aks', function() {
    return view('err_akses');
});

Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'auth_login'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'auth_logout'])->middleware('auth');

// dashboard
Route::get('/home', [HomeController::class, 'index'])->middleware('auth', 'all');

// Data User
Route::get('/data-user', [UserController::class, 'index'])->middleware('auth', 'admin');
Route::post('/tambah-user', [UserController::class, 'tambah'])->middleware('auth', 'admin');
Route::get('/hapus-user/{id}', [UserController::class, 'hapus'])->middleware('auth', 'admin');
Route::get('/edit-user/{id}', [UserController::class, 'edit'])->middleware('auth', 'admin');
Route::put('/ubah-user/{id}', [UserController::class, 'ubah'])->middleware('auth', 'admin');

// Data Kategori
Route::get('/data-kategori', [KategoriController::class, 'index'])->middleware('auth', 'admin');
Route::post('/tambah-kategori', [KategoriController::class, 'tambah'])->middleware('auth', 'admin');
Route::get('/hapus-kategori/{id}', [KategoriController::class, 'hapus'])->middleware('auth', 'admin');
Route::get('/edit-kategori/{id}', [KategoriController::class, 'edit'])->middleware('auth', 'admin');
Route::put('/ubah-kategori/{id}', [KategoriController::class, 'ubah'])->middleware('auth', 'admin');

// data barang
Route::get('/data-barang', [BarangController::class, 'index'])->middleware('auth', 'admin');
Route::post('/tambah-barang', [BarangController::class, 'tambah'])->middleware('auth', 'admin');
Route::get('/hapus-barang/{id}', [BarangController::class, 'hapus'])->middleware('auth', 'admin');
Route::get('/edit-barang/{id}', [BarangController::class, 'edit'])->middleware('auth', 'admin');
Route::put('/ubah-barang/{id}', [BarangController::class, 'ubah'])->middleware('auth', 'admin');

// laporan barang masuk
Route::get('/laporan-masuk', [LaporanBarangMasuk::class, 'index'])->middleware('auth', 'admin');
Route::get('/cetak', [LaporanBarangMasuk::class, 'cetak'])->middleware('auth', 'admin');

// data barang masuk
Route::get('/data-barang-masuk', [DataBarangMasuk::class, 'index'])->middleware('auth', 'gudang');
Route::get('/tambah-data', [DataBarangMasuk::class, 'tambah'])->middleware('auth', 'gudang');
Route::post('/insert-data-barang', [DataBarangMasuk::class, 'insert'])->middleware('auth', 'gudang');
