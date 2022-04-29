<?php

namespace App\Http\Controllers;

use App\Models\pengaduan;
use App\Models\kategori;
use App\Models\pelanggan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function create()
    {

        $id_profile = session('id');

        // ambil data profile berdasarkan id_profile (session)
        $tb_pelanggan = pelanggan::where('profile_id', $id_profile)->first();
        $tb_kategori  = kategori::get();

        $data['pelanggan'] = $tb_pelanggan;
        $data['kategori']  = $tb_kategori;

        return view('pelanggan.pengaduan.create', $data);
    }


    // proses tambah 
    function process( Request $request ) {

        $id_profile = session('id');
        // ambil data profile berdasarkan id_profile (session)
        $tb_pelanggan = pelanggan::where('profile_id', $id_profile)->first();

        $id_pelanggan = $tb_pelanggan->id;


        $request->validate([

            
            'kategori'  => 'required',
            'keterangan'=> 'required',
            'fotoaduan'   => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        /** Upload file */
        $file = $request->file('fotoaduan');
        $nama_file = $id_profile.'-'.time()."_".$file->getClientOriginalName();

        $path = "lampiran_pengaduan";
        $file->move($path, $nama_file);

        $kategori = $request->input('kategori');
        $keterangan = $request->input('keterangan');

        $isi_pengaduan = array(

            'pelanggan_id'  => $id_pelanggan, 
            'kategori_id'   => $kategori, 
            'status'        => "menunggu",
            'keterangan'    => $keterangan,
            'fotoaduan'     => $nama_file,
        );


        pengaduan::create( $isi_pengaduan );

        redirect();
    }



    function confirmation() {
        return view('pelanggan.pengaduan.confirmation');
    }
}
