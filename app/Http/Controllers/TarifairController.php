<?php

namespace App\Http\Controllers;

use App\Models\tarifair;
use Illuminate\Http\Request;

class TarifairController extends Controller
{
    public function index()
    {
        $tarifairs = tarifair::all();
        return view('petugas.tarifair.index')->with('tarifairs',$tarifairs);
    }

    public function create()
    {
        return view('petugas.tarifair.create');
    }

    //tampil dihalaman utama
    public function index2()
    {
        $tarifairs = tarifair::all();
        return view('halamantarifair')->with('tarifairs',$tarifairs);
    }
}
