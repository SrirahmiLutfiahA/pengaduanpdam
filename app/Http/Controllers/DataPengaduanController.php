<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Models\pengaduan;
use App\Models\TeknisiPengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataPengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = DB::table('pengaduans')
        ->join('pelanggans', 'pelanggans.id', '=', 'pengaduans.pelanggan_id')
        ->join('kategoris', 'kategoris.id', '=', 'pengaduans.kategori_id')
        ->select('pengaduans.*', 'pelanggans.namalengkap', 'telp', 'alamat', 'nosambungan', 'namakategori')
        ->get();
        return view('admin.pengaduan.index')->with('pengaduans', $pengaduans);
    }

    public function indexpengaduanbaru()
    {
        $pengaduans = DB::table('pengaduans')
        ->join('pelanggans', 'pelanggans.id', '=', 'pengaduans.pelanggan_id')
        ->join('kategoris', 'kategoris.id', '=', 'pengaduans.kategori_id')
        ->select('pengaduans.*', 'pelanggans.namalengkap', 'telp', 'alamat', 'nosambungan', 'namakategori')
        ->where('status','=','0')
        ->get();
        return view('admin.pengaduan.index')->with('pengaduans', $pengaduans);
    }

    public function indexpengaduanditolak()
    {
        $pengaduans = DB::table('pengaduans')
        ->join('pelanggans', 'pelanggans.id', '=', 'pengaduans.pelanggan_id')
        ->join('kategoris', 'kategoris.id', '=', 'pengaduans.kategori_id')
        ->select('pengaduans.*', 'pelanggans.namalengkap', 'telp', 'alamat', 'nosambungan', 'namakategori')
        ->where('status','=','1')
        ->get();
        return view('admin.pengaduan.index')->with('pengaduans', $pengaduans);
    }

    public function indexpengaduanselesaiperbaikan()
    {
        $pengaduans = DB::table('pengaduans')
        ->join('pelanggans', 'pelanggans.id', '=', 'pengaduans.pelanggan_id')
        ->join('kategoris', 'kategoris.id', '=', 'pengaduans.kategori_id')
        ->select('pengaduans.*', 'pelanggans.namalengkap', 'telp', 'alamat', 'nosambungan', 'namakategori')
        ->where('status','=','4')
        ->get();
        return view('admin.pengaduan.index')->with('pengaduans', $pengaduans);
    }

    public function indexpengaduanselesai()
    {
        $pengaduans = DB::table('pengaduans')
        ->join('pelanggans', 'pelanggans.id', '=', 'pengaduans.pelanggan_id')
        ->join('kategoris', 'kategoris.id', '=', 'pengaduans.kategori_id')
        ->select('pengaduans.*', 'pelanggans.namalengkap', 'telp', 'alamat', 'nosambungan', 'namakategori')
        ->where('status','=','5')
        ->get();
        return view('admin.pengaduan.index')->with('pengaduans', $pengaduans);
    }
//untuk petugasnya
    public function indexpetugas()
    {
        $pengaduans = DB::table('pengaduans')
        ->join('pelanggans', 'pelanggans.id', '=', 'pengaduans.pelanggan_id')
        ->join('kategoris', 'kategoris.id', '=', 'pengaduans.kategori_id')
        ->select('pengaduans.*', 'pelanggans.namalengkap', 'telp', 'alamat', 'nosambungan', 'namakategori')
        ->where('status','=','2')
        ->get();
        return view('trandis.pengaduan.index')->with('pengaduans', $pengaduans);
    }

    public function indexpetugasperbaikan()
    {
        $pengaduans = DB::table('pengaduans')
        ->join('pelanggans', 'pelanggans.id', '=', 'pengaduans.pelanggan_id')
        ->join('kategoris', 'kategoris.id', '=', 'pengaduans.kategori_id')
        ->select('pengaduans.*', 'pelanggans.namalengkap', 'telp', 'alamat', 'nosambungan', 'namakategori')
        ->where('status','=','3')
        ->get();
        return view('trandis.pengaduan.index')->with('pengaduans', $pengaduans);
    }

    public function indexpetugasselesaiperbaikan()
    {
        $pengaduans = DB::table('pengaduans')
        ->join('pelanggans', 'pelanggans.id', '=', 'pengaduans.pelanggan_id')
        ->join('kategoris', 'kategoris.id', '=', 'pengaduans.kategori_id')
        ->select('pengaduans.*', 'pelanggans.namalengkap', 'telp', 'alamat', 'nosambungan', 'namakategori')
        ->where('status','=','4')
        ->get();
        return view('trandis.pengaduan.index')->with('pengaduans', $pengaduans);
    }




    // proses perubahan pengaduan 
    public function proses_pengubahan_pengaduan(Request $request, $id_pengaduan) {

        $ambilStatus = $request->input('status_admin');
        $keterangan  = null;


        if ( $ambilStatus == 1 ) {

            $keterangan = $request->input('keterangan');
        }


        $data = array(

            'status'        => $ambilStatus,
            'balasanadmin'  => $keterangan,
            'laporan_tanggal_admin' => date('Y-m-d H:i:s'),
        );


        // update
        DB::table('pengaduans')->where('id', $id_pengaduan)->update($data);

        return redirect('riwayat/detail/'. $id_pengaduan);
    }
    
    public function proses_pengubahan_pengaduan_petugas(Request $request, $id_pengaduan) {

        $ambilTeknisi = $request->input('teknisi');

        $dt_pengaduan = array(

            'status'        => '3',
            'laporan_diperbaiki' => date('Y-m-d H:i:s'),
        );


        $dt_teknisi = array();
        foreach ( $ambilTeknisi AS $id_teknisi ) {

            array_push( $dt_teknisi, array(

                'id_pengaduan'  => $id_pengaduan,
                'id_teknisi'    => $id_teknisi
            ) );
        }


        // update
        DB::table('pengaduans')->where('id', $id_pengaduan)->update($dt_pengaduan);

        // tambah data teknisi
        TeknisiPengaduan::insert( $dt_teknisi );

        return redirect('riwayat/detail/'. $id_pengaduan);
    }
    
    public function proses_dokumentasi_pengaduan_petugas(Request $request, $id_pengaduan) {

        $foto_sebelum = "";
        $foto_sesudah = "";

        $request->validate([

            'before-upload'   => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'after-upload'   => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        /** Upload file */
        $path = "dokumentasi";
        
        $file_bef = $request->file('before-upload');
        $file_af = $request->file('after-upload');
        
        $foto_sebelum = "BF"."-".time()."_".$id_pengaduan."_".$file_bef->getClientOriginalName();
        $file_bef->move($path, $foto_sebelum);
        
        $foto_sesudah = "AF"."-".time()."_".$id_pengaduan."_".$file_af->getClientOriginalName();
        $file_af->move($path, $foto_sesudah);


        $dt_pengaduan = array(

            'status'        => '4',
            'fotosebelum'  => $foto_sebelum,
            'fotoselesai'  => $foto_sesudah,
            'laporan_selesai_perbaikan' => date('Y-m-d H:i:s'),
        );

        // update
        DB::table('pengaduans')->where('id', $id_pengaduan)->update($dt_pengaduan);
        return redirect('riwayat/detail/'. $id_pengaduan);
    }




    public function proses_konfirmasi_pengaduan($id_pengaduan) {

        
        $dt_pengaduan = array(

            'status'        => '5',
            'tanggalselesai' => date('Y-m-d H:i:s'),
        );

        // update
        DB::table('pengaduans')->where('id', $id_pengaduan)->update($dt_pengaduan);

        return redirect('riwayat/detail/'. $id_pengaduan);
    }


    public function laporan()
    {
        

        return view('admin/laporan/reportpengaduan');
    }

    public function print($tglAwal, $tglAkhir){
        // $data_aduan = Pengaduan::all()->whereBetween('created_at',[$tglAwal, $tglAkhir]);

        $data_aduan = DB::table('pengaduans')
                        ->join('pelanggans', 'pelanggans.id', '=', 'pengaduans.pelanggan_id')
                        ->join('kategoris', 'kategoris.id', '=', 'pengaduans.kategori_id')
                        ->select('pengaduans.*', 'pelanggans.namalengkap', 'telp', 'alamat', 'nosambungan', 'namakategori')
                        ->whereBetween('pengaduans.created_at',[$tglAwal, $tglAkhir])
                        ->get();

        return view('admin/laporan/detailreport', compact('data_aduan'));
    }



    public function laporan_pelanggan() {

        return view('admin/laporan/reportpelanggan');
    }


    public function print_pelanggan( $tglAwal = null, $tglAkhir = null ) {

        // cek opsi
        if ( $tglAwal ) {

            $data = pelanggan::all()->whereBetween('created_at',[$tglAwal, $tglAkhir]);
        } else {

            $data = pelanggan::all();
        }


        return view('admin/laporan/detailreportpelanggan', compact('data'));
    }
    
    // public function create()
    // {
    //     return view('admin.pengaduan.create');
    // }


    // proses tambah

    // function process(Request $request)
    // {

    //     $getPelanggan_id = $request->input('pelanggan_id');
    //     $getKategori_id = $request->input('kategori_id');
    //     $getStatus = $request->input('status');
    //     $getKeterangan = $request->input('keterangan');
    //     $getFotoAduan = $request->input('fotoaduan');
    //     $getBalasanAdmin = $request->input('balasanadmin');
    //     $getLaporanTanggalAdmin = $request->input('laporan_tanggal_admin');
    //     $getFotoSebelum = $request->input('fotosebelum');
    //     $getLaporanDiperbaiki = $request->input('laporan_diperbaiki');
    //     $getFotoProses = $request->input('fotoproses');
    //     $getFotoSelesai = $request->input('fotoselesai');
    //     $getLaporanSelesaiPerbaikan = $request->input('laporan_selesai_perbaikan');
    //     $getTanggalSelesai = $request->input('tanggalselesai');

        // insert to db 
    //     $data = array(

    //         'pelanggan_id' => $getPelanggan_id,
    //         'kategori_id'    => $getKategori_id,
    //         'status' => $getStatus,
    //         'keterangan' => $getKeterangan,
    //         'fotoaduan' => $getFotoAduan,
    //         'balasanadmin' => $getBalasanAdmin,
    //         'laporan_tanggal_admin' => $getLaporanTanggalAdmin,
    //         'fotosebelum'    => $getFotoSebelum,
    //         'laporan_diperbaiki' => $getLaporanDiperbaiki,
    //         'fotoproses' => $getFotoProses,
    //         'fotoselesai' => $getFotoSelesai,
    //         'laporan_selesai_perbaikan' => $getLaporanSelesaiPerbaikan,
    //         'tanggalselesai' => $getTanggalSelesai,
    //     );

    //     pengaduan::create($data);

    //     return redirect('pengaduanindex');
    // }


    // function delete($id)
    // {

    //     $pengaduan = pengaduan::find($id);

    //     if ($pengaduan) {

    //         $pengaduan->delete();
    //         return redirect('pengaduanindex')->with('pesan', 'Berhasil terhapus');
    //     } else {

    //         return abort(404);
    //     }
    // }


    //
    // function update(Request $request, $id)
    // {

    //     $pengaduan = pengaduan::find($id);

    //     if ($pengaduan) {

    //         $getPelanggan_id            = $request->input('pelanggan_id');
    //         $getKategori_id             = $request->input('kategori_id');
    //         $getStatus                  = $request->input('status');
    //         $getKeterangan              = $request->input('keterangan');
    //         $getFotoAduan               = $request->input('fotoaduan');
    //         $getBalasanAdmin            = $request->input('balasanadmin');
    //         $getLaporanTanggalAdmin     = $request->input('laporan_tanggal_admin');
    //         $getFotoSebelum             = $request->input('fotosebelum');
    //         $getLaporanDiperbaiki       = $request->input('laporan_diperbaiki');
    //         $getFotoProses              = $request->input('fotoproses');
    //         $getFotoSelesai             = $request->input('fotoselesai');
    //         $getLaporanSelesaiPerbaikan = $request->input('laporan_selesai_perbaikan');
    //         $getTanggalSelesai          = $request->input('tanggalselesai');
            
            // insert to db 
        //     $data = array(

        //         'pelanggan_id' => $getPelanggan_id,
        //         'kategori_id'    => $getKategori_id,
        //         'status' => $getStatus,
        //         'keterangan' => $getKeterangan,
        //         'fotoaduan' => $getFotoAduan,
        //         'balasanadmin' => $getBalasanAdmin,
        //         'laporan_tanggal_admin' => $getLaporanTanggalAdmin,
        //         'fotosebelum'    => $getFotoSebelum,
        //         'laporan_diperbaiki' => $getLaporanDiperbaiki,
        //         'fotoproses' => $getFotoProses,
        //         'fotoselesai' => $getFotoSelesai,
        //         'laporan_selesai_perbaikan' => $getLaporanSelesaiPerbaikan,
        //         'tanggalselesai' => $getTanggalSelesai,
        //     );


        //     $pengaduan->update($data);
        //     return redirect('pengaduanindex');
        // } else return abort(404);
    }
    