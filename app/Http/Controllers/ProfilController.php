<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    //view login
    public function login()
    {
        return view('login');
    }
    //view registrasi
    public function register()
    {
        return view('register');
    }
}
