<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarifairController;
use App\Http\Controllers\KritiksaranController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\DataPengaduanController;
use App\Http\Controllers\EksekutorController;
use Illuminate\Support\Facades\Hash;

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
    return view('welcome');
});


Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [LoginController::class, 'proses_registrasi']);

Route::get('/dbadmin', function () {
    return view('admin.dbadmin');
});

Route::get('/dbpelanggan', function () {
    return view('pelanggan.dbpelanggan');
});
Route::get('/dbpetugas', function () {
    return view('trandis.dbpetugas');
});

//Tarif Air
Route::resource('petugas.tarifair','TarifairController');
Route::get('/index', [TarifairController::class, 'index'])->name('tarifair.index');
Route::get('/create', [TarifairController::class, 'create'])->name('tarifair.create');
//tampil dihal utama
Route::get('/indextarif', [TarifairController::class, 'indextarif'])->name('halamantarifair');


/** Modules :: Login */
Route::get('/login', [LoginController::class, 'index']);
Route::post('/authenticate', [LoginController::class, 'proses']);
Route::get('logout',  [LoginController::class, 'logout']);


Route::get('/make-password', function(){
    
    echo Hash::make("123");
});






/** Modules :: Dashboard */
Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('dashboardpelanggan', [DashboardController::class, 'index2']);
Route::get('dashboardpetugas', [DashboardController::class, 'index3']);



/** Modules :: Tarif Air */
Route::get('tarif', [TarifairController::class, 'index']);
Route::get('tarif/create', [TarifairController::class, 'create']);
Route::post('tarif/create', [TarifairController::class, 'process']);
Route::get('tarif/delete/{id}', [TarifairController::class, 'delete']);

// Route::get('tarif/edit/{id}', [TarifairController::class, 'viewedit']);
Route::post('tarif/edit/{id}', [TarifairController::class, 'update']);

/** Kritik Saran */
// Route::resource('admin.kritiksaran','KritiksaranController');
Route::get('/kritiksaranindex', [KritiksaranController::class, 'index'])->name('/kritiksaranindex');
Route::get('kritiksaran/create', [KritiksaranController::class, 'create']);
Route::post('kritiksaran/create', [KritiksaranController::class, 'process']);
Route::get('kritiksaran/delete/{id}', [KritiksaranController::class, 'delete']);

/**Data Pelanggan */
Route::get('pelangganindex', [PelangganController::class, 'index'])->name('/pelangganindex');
Route::get('pelanggancreate', [PelangganController::class, 'create'])->name('/pelanggancreate');
Route::post('pelanggancreate', [PelangganController::class, 'process'])->name('/pelanggancreate');
Route::get('pelanggan/delete/{id}', [PelangganController::class, 'delete']);
Route::post('pelanggan/edit/{id}', [PelangganController::class, 'update']);
Route::get('pelanggan/detail/{id}', [PelangganController::class, 'detail']);

/** Modules :: Kategori */
Route::get('kategori', [KategoriController::class, 'index']);
Route::get('kategoricreate', [KategoriController::class, 'create']);
Route::post('kategoricreate', [KategoriController::class, 'process']);
Route::get('kategori/delete/{id}', [KategoriController::class, 'delete']);

/** Pengaduan */

Route::get('pengaduancreate', [PengaduanController::class, 'create']);
Route::post('pengaduancreate', [PengaduanController::class, 'process']);

Route::get('send', [PengaduanController::class, 'confirmation']);




/** Riwayat Pengaduan */
Route::get('riwayat', [RiwayatController::class, 'index']);
Route::get('riwayat/detail/{id}', [RiwayatController::class, 'detail']);

/**Data Pengaduan */
Route::get('pengaduanindex', [DataPengaduanController::class, 'index'])->name('/pengaduanindex');
Route::get('pengaduanindexbaru', [DataPengaduanController::class, 'indexpengaduanbaru'])->name('/pengaduanindexbaru');
Route::get('pengaduanindexditolak', [DataPengaduanController::class, 'indexpengaduanditolak'])->name('/pengaduanindexditolak');
Route::get('pengaduanindexselesaiperbaikan', [DataPengaduanController::class, 'indexpengaduanselesaiperbaikan'])->name('/pengaduanindexselesaiperbaikan');
Route::get('pengaduanindexselesai', [DataPengaduanController::class, 'indexpengaduanselesai'])->name('/pengaduanindexselesai');

//petugas
Route::get('pengaduanindexpetugas', [DataPengaduanController::class, 'indexpetugas'])->name('/pengaduanindexpetugas');
Route::get('pengaduanindexperbaikan', [DataPengaduanController::class, 'indexpetugasperbaikan'])->name('/pengaduanindexperbaikan');
Route::get('pengaduanpetugasselesaiperbaikan', [DataPengaduanController::class, 'indexpetugasselesaiperbaikan'])->name('/pengaduanpetugasselesaiperbaikan');




// Pengubahan status pengaduan : Admin
Route::post('konfirmasipengaduan/{id_pengaduan}', [DataPengaduanController::class, 'proses_pengubahan_pengaduan']);

/** Modules :: Data Eksekutor */
Route::get('teknisi', [EksekutorController::class, 'index']);
Route::get('teknisicreate', [EksekutorController::class, 'create']);
Route::post('teknisicreate', [EksekutorController::class, 'process']);
Route::get('teknisi/delete/{id_teknisi}', [EksekutorController::class, 'delete']);
Route::post('teknisi/edit/{id_teknisi}', [EksekutorController::class, 'update']);


/** Laporan Pengaduan */
Route::get('/laporan', [App\Http\Controllers\DataPengaduanController::class, 'laporan'])->name('laporan');
Route::get('/print/{tglAwal}/{tglAkhir}', [App\Http\Controllers\DataPengaduanController::class, 'print'])->name('print');

Route::get('/laporan-pelanggan', [DataPengaduanController::class, 'laporan_pelanggan']);
Route::get('/print-pelanggan/{tglAwal}/{tglAkhir}', [DataPengaduanController::class, 'print_pelanggan']);
Route::get('/print-pelanggan', [DataPengaduanController::class, 'print_pelanggan']);

Route::get('/forgotpw', [LoginController::class, 'forgotpw'])->name('forgotpw');
Route::get('/resetpw', [LoginController::class, 'resetpw'])->name('resetpw');
