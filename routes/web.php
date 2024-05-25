<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\AtributController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\RangkingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

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
    return view('index',);
});



 Route::get('/', function () {
     return view('home', ['title' => 'Home']);
 })->name('home');

 Route::get('register', [UserController::class, 'register'])->name('register');
 Route::post('register', [UserController::class, 'register_action'])->name('register.action');
 Route::get('login', [UserController::class, 'login'])->name('login');
 Route::post('login', [UserController::class, 'login_action'])->name('login.action');
 Route::get('password', [UserController::class, 'password'])->name('password');
 Route::post('password', [UserController::class, 'password_action'])->name('password.action');
 Route::get('logout', [UserController::class, 'logout'])->name('logout');
 Route::get('index', [PenggunaController::class, 'index'])->name('index');
Route::resource('pengguna', PenggunaController::class);
 Route::resource('pegawai', PegawaiController::class);
 Route::resource('gudang', GudangController::class);
 Route::resource('kategori', KategoriController::class);
 Route::resource('outlet', OutletController::class);
 Route::resource('profil', ProfilController::class);
 Route::resource('nilai', NilaiController::class);
 Route::resource('alternatif', AlternatifController::class);
 Route::resource('penilaian', PenilaianController::class);
 Route::resource('atribut', AtributController::class);
Route::resource('layanan', LayananController::class);
 Route::resource('kriteria', KriteriaController::class);
 Route::resource('pengiriman', PengirimanController::class);
Route::resource('barang', BarangController::class);
 Route::resource('coba', CobaController::class);
 Route::get('/rangking',[RangkingController::class, 'index'])->name('rangking');