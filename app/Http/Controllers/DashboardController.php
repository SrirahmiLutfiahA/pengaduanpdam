<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        return view('admin.dbadmin');
    }

    public function index2() {

        return view('pelanggan.dbpelanggan');
    }

    public function index3() {

        return view('trandis.dbpetugas');
    }





    // load view dashboard admin 





    // load view dashboard pegawai

}
