<?php

namespace App\Http\Controllers;

use App\Models\pengaduan;
use App\Models\kategori;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function create()
    {
        return view('pelanggan.pengaduan.create');
    }
}
