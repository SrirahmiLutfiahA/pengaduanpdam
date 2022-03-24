<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // view utama
    public function index() {

        return view('login');
    }


    function proses( Request $request ) {

        /**
         * TODO List
         * 1. Ambil nilai input email dan password
         * 2. Cek tabel profiles berdasarkan email 
         *      2.1 Apakah email tersedia ? 
         *          -> Iya maka lanjut ke step 3 
         *          -> tidak maka ke step 5
         * 3. Cek kata sandi yang dimasukkan 
         *      -> Valid ? lanjut ke step 4 
         *      -> tidak valid ? lanjut ke step 5
         * 
         * 4. Masuk halaman dashboard
         * 5. Menuju halaman login
         */



        // @TODO 1 : Ambil nilai input email
        $getEmail = $request->input('email');
        $getPassword = $request->input('password');

        // @TODO 2 : Cek tabel profiles berdasarkan email
        $profile = DB::table('profiles')->where('email', $getEmail)->first();

        // @TODO 2.1 
        if ( $profile ) {

            // @TODO 3 : cek kata sandi 
            if ( Hash::check($getPassword, $profile->password) ) {

                $sess = array(

                    'id'        => $profile->id, 
                    'username'  => $profile->username, 
                    'email'     => $profile->email,
                    'level'     => $profile->level,
                );

                $request->session()->put( $sess );
                // redirect 
                return redirect('dashboard');

            } else {

                // @halaman login
                return redirect('login')->with('pesan', 'Kata sandi salah !');
            }

        } else {

            // @halaman login
            return redirect('login')->with('pesan', 'Email tidak terdaftar !');
        }
    }




    function logout( Request $request ) {

        $request->session()->forget('id');
        $request->session()->forget('username');
        $request->session()->forget('email');
        
        
        return redirect('login');
    }
}
