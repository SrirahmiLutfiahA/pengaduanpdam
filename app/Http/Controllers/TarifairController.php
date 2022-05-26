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


    // proses tambah
    function process( Request $request ) {

        $request->validate([

            'kelompokpelanggan' => 'required',
            'hargapemakaian'  => 'required',
            'biayapemeliharaan'=> 'required',
            'biayaadministrasi'=> 'required',


        ]);

        $getKelompok = $request->input('kelompokpelanggan');
        $getPemakaian    = $request->input('hargapemakaian');
        $getPemeliharaan = $request->input('biayapemeliharaan');
        $getAdministrasi = $request->input('biayaadministrasi');

        // insert to db 
        $data = array(

            'kelompok_pelanggan'=> $getKelompok,
            'hargapemakaian'    => $getPemakaian,
            'biayapemeliharaan' => $getPemeliharaan,
            'biayaadministrasi' => $getAdministrasi
        );
        
        tarifair::create($data);

        return redirect('tarif');
    }




    function delete( $id ) {

        $tarifair = tarifair::find( $id );

        if ( $tarifair ) {

            $tarifair->delete();
            return redirect( 'tarif' )->with('pesan', 'Berhasil terhapus');

        } else {

            return abort(404);
        }
    }





    //
    function update( Request $request, $id ) {

        $tarifair = tarifair::find( $id );

        if ( $tarifair ) {

            $getKelompok = $request->input('kelompokpelanggan');
            $getPemakaian    = $request->input('hargapemakaian');
            $getPemeliharaan = $request->input('biayapemeliharaan');
            $getAdministrasi = $request->input('biayaadministrasi');

            // insert to db 
            $data = array(

                'kelompok_pelanggan'=> $getKelompok,
                'hargapemakaian'    => $getPemakaian,
                'biayapemeliharaan' => $getPemeliharaan,
                'biayaadministrasi' => $getAdministrasi
            );


            $tarifair->update($data);
            return redirect('tarif');


        } else return abort(404);
    }



    //tampil dihalaman utama
    public function indextarif()
    {
        $tarifairs = tarifair::all();
        return view('halamantarifair')->with('tarifairs',$tarifairs);
    }
}
