<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarifairController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;


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
Route::get('/index', [App\Http\Controllers\TarifairController::class, 'index'])->name('tarifair.index');
Route::get('/create', [App\Http\Controllers\TarifairController::class, 'create'])->name('tarifair.create');
//tampil dihal utama
Route::get('/index2', [App\Http\Controllers\TarifairController::class, 'index2'])->name('halamantarifair');




/** Modules :: Login */
Route::get('/login', [LoginController::class, 'index']);
Route::post('/authenticate', [LoginController::class, 'proses']);
Route::get('logout',  [LoginController::class, 'logout']);


Route::get('/make-password', function(){
    
    echo Hash::make("123");
});






/** Modules :: Dashboard */
Route::get('dashboard', [DashboardController::class, 'index']);





/** Modules :: Tarif Air */
Route::get('tarif', [TarifairController::class, 'index']);
Route::get('tarif/create', [TarifairController::class, 'create']);
Route::post('tarif/create', [TarifairController::class, 'process']);
Route::get('tarif/delete/{id}', [TarifairController::class, 'delete']);

// Route::get('tarif/edit/{id}', [TarifairController::class, 'viewedit']);
Route::post('tarif/edit/{id}', [TarifairController::class, 'update']);

