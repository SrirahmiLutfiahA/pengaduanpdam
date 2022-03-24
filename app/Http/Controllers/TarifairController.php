<?php

namespace App\Http\Controllers;

use App\Models\tarifair;
use Illuminate\Http\Request;

class TarifairController extends Controller
{
    public function index()
    {
        $tarifairs = tarifair::all();
        return view('admin.tarifair.index')->with('tarifairs',$tarifairs);
    }

    public function create()
    {
        return view('admin.tarifair.create');
    }

    //tampil dihalaman utama
    public function index2()
    {
        $tarifairs = tarifair::all();
        return view('halamantarifair')->with('tarifairs',$tarifairs);
    }
}
