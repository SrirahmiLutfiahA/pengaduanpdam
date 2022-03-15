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
    return view('pelanggan.dbpelanggan');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/dbpetugas', function () {
    return view('petugas.dbpetugas');
});

Route::get('/dbpelanggan', function () {
    return view('pelanggan.dbpelanggan');
});

//Tarif Air
Route::resource('petugas.tarifair','TarifairController');
Route::get('/index', [App\Http\Controllers\TarifairController::class, 'index'])->name('tarifair.index');
Route::get('/create', [App\Http\Controllers\TarifairController::class, 'create'])->name('tarifair.create');
