<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Models\pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller{
    
    function index() {

        $level = session('level');
        if ( $level == "admin" ) {

            return $this->preview_admin();
        
        } else { // login sebagai pelanggan

            return $this->preview_pelanggan();
        }
    }




    function preview_pelanggan() {


        /** Ambil identitas pelanggan */
        $id_profile = session('id');
        $tb_pelanggan = pelanggan::where('profile_id', $id_profile)->first();

        $id_pelanggan = $tb_pelanggan->id;
        


        // ambil data pengaduan
        $tb_pengaduan = DB::table('pengaduans')
                            ->join('kategoris', 'kategoris.id', '=' ,'pengaduans.kategori_id')
                            ->select('pengaduans.*', 'kategoris.namakategori')
                            ->where('pelanggan_id', $id_pelanggan)
                            ->get();

        // $tb_pengaduan = pengaduan::where('pelanggan_id', $id_pelanggan)->get();
        $data['pengaduan'] = $tb_pengaduan;

        return view('pelanggan.riwayat.index', $data);
    }


    function preview_admin() {

        echo "admin";
    }









    // detail
    function detail( $id = null ) {

        if ( $id ) {

            // ambil data pengaduan
            $tb_pengaduan = DB::table('pengaduans')
                                ->join('kategoris', 'kategoris.id', '=' ,'pengaduans.kategori_id')
                                ->select('pengaduans.*', 'kategoris.namakategori')
                                ->where('pengaduans.id', $id)
                                ->first();


            /** Ambil identitas pelanggan */
            $id_profile = "";

            if ( session('level') != "pelanggan" )  {

                // apabila admin ingin mendetail
                $id_pelanggan = $tb_pengaduan->pelanggan_id;

                $tb_pelanggan = DB::table('pelanggans')->where('id', $id_pelanggan)->first();
                $id_profile = $tb_pelanggan->profile_id;
                
                
            } else {

                // login sebagai pelanggan
                $id_profile = session('id');
            }

            
            $tb_pelanggan = pelanggan::where('profile_id', $id_profile)->first();


            // ambil data pengaduan
            $tb_pengaduan = DB::table('pengaduans')
                                ->join('kategoris', 'kategoris.id', '=' ,'pengaduans.kategori_id')
                                ->select('pengaduans.*', 'kategoris.namakategori')
                                ->where('pengaduans.id', $id)
                                ->first();



            $tb_teknisi = DB::table('teknisi_pengaduan')
                            ->join('teknisi', 'teknisi.id_teknisi', '=', 'teknisi_pengaduan.id_teknisi')
                            ->select('teknisi_pengaduan.*', 'teknisi.*')
                            ->where('teknisi_pengaduan.id_pengaduan', $id)
                            ->get();

            // ambil keseluruhan data teknisi : untuk dilakukan pemberangkatan oleh petugas
            $dt_teknisi_baru = DB::table('teknisi')->where('status_bekerja', "aktif")->get();

            // $tb_pengaduan = pengaduan::where('pelanggan_id', $id_pelanggan)->get();
            $data['pengaduan'] = $tb_pengaduan;
            $data['pelanggan'] = $tb_pelanggan;
            $data['teknisi']   = $tb_teknisi;
            $data['teknisi_baru'] = $dt_teknisi_baru;

            return view('pelanggan.riwayat.detail', $data);

        } else {

            return abort(404);
        }
    }
}
