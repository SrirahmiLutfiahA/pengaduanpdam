<?php

namespace App\Http\Controllers;


use App\Models\pelanggan;
use App\Models\pengaduan;
use App\Models\tarifair;
use App\Models\kritiksaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index() {
        
        $count_pelanggan = DB::table('pelanggans')->count();
        $count_aduan = DB::table('pengaduans')->count();
        $count_kritik = DB::table('kritiksarans')->count();
        $count_menunggu = DB::table('pengaduans')->where('status', '0')->count();
        $count_ditolak = DB::table('pengaduans')->where('status', '1')->count();
        $count_diajukan = DB::table('pengaduans')->where('status', '2')->count();
        $count_perbaikan = DB::table('pengaduans')->where('status', '3')->count();
        $count_selesaiperbaikan = DB::table('pengaduans')->where('status', '4')->count();

        return view('admin.dbadmin', compact('count_pelanggan','count_aduan','count_kritik', 'count_ditolak', 'count_menunggu','count_diajukan','count_perbaikan', 'count_selesaiperbaikan'));
    }

    public function index2() {

        return view('pelanggan.dbpelanggan');
    }

    public function index3() {
        $count_aduan = DB::table('pengaduans')->count();
        $count_diajukan = DB::table('pengaduans')->where('status', '2')->count();
        $count_perbaikan = DB::table('pengaduans')->where('status', '3')->count();
        $count_selesaiperbaikan = DB::table('pengaduans')->where('status', '4')->count();

        return view('trandis.dbpetugas', compact('count_aduan', 'count_diajukan','count_perbaikan', 'count_selesaiperbaikan'));
    }





    // load view dashboard admin 





    // load view dashboard pegawai

}
