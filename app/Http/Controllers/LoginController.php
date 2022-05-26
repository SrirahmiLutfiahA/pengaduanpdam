<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Models\profile;
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


        //validasi
        $request->validate([

            'email' => 'required',
            'password'  => 'required',
        ]);

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

                $username = $profile->username;

                $link = "";

                if ( $profile->level == "pelanggan" ) {

                    $pelanggan = pelanggan::where('profile_id', $profile->id)->first();
                    $username = $pelanggan->namalengkap;

                    // Link redirect
                    $link = "/dashboardpelanggan";
                
                } else if ( $profile->level == "petugas" ) {

                    // login sebagai petugas
                    $link = "/dashboardpetugas";
                } else {


                    // login sebagai admin 
                    $link = "dashboard";
                }

                $sess = array(
                    'id'        => $profile->id, 
                    'username'  => $username, 
                    'email'     => $profile->email,
                    'level'     => $profile->level,
                );

                

                $request->session()->put( $sess );
                // redirect 
                return redirect( $link );

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




    /** prosess registrasi */
    function proses_registrasi( Request $request ) {

        $request->validate([

            'fullname' => 'required',
            'telepon'  => 'required',
            'alamat'=> 'required',
            'email' => 'required',
            'no_sambungan'       => 'required',
            'bukti_pembayaran'   => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'password'          => 'required|string|min:8|confirmed',
            'password_confirmation'=> "required",
        ]);


        /** Upload file */
        $file = $request->file('bukti_pembayaran');
        $nama_file = time()."_".$file->getClientOriginalName();

        $path = "bukti_pembayaran";
        $file->move($path, $nama_file);

        $nama_lengkap = $request->input('fullname');
        $telepon = $request->input('telepon');
        $alamat  = $request->input('alamat');
        $no_sambungan = $request->input('no_sambungan');
        $email = $request->input('email');
        $password = $request->input('password');
        
        // $agree = $request->input('agree');


        $profile = profile::create([

            'username'  => "",
            'password'  => Hash::make($password),
            'email'     => $email,
            'level'     => "pelanggan" 
        ]);

        $ambil_id_profile_terakhir = $profile->id;


        // eloquent 
        pelanggan::create([
            
            'profile_id'    => $ambil_id_profile_terakhir,
            'namalengkap'  => $nama_lengkap,
            'telp'          => $telepon, 
            'alamat'        => $alamat,
            'nosambungan'   => $no_sambungan,
            'buktipembayaran' => $nama_file
        ]);


        return redirect('login');
        


    }
}
