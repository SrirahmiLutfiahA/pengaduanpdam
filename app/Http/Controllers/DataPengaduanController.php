<?php

namespace App\Http\Controllers;

use App\Models\pengaduan;
use Illuminate\Http\Request;

class DataPengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = pengaduan::all();
        return view('admin.pengaduan.index')->with('pengaduans', $pengaduans);
    }

    public function indexpetugas()
    {
        $pengaduans = pengaduan::all();
        return view('trandis.pengaduan.index')->with('pengaduans', $pengaduans);
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

