<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarifairController;

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
Route::get('/login', function () {
    return view('login');
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
