<?php

namespace App\Http\Controllers;

use App\Models\teknisi;
use Illuminate\Http\Request;

class EksekutorController extends Controller
{
    public function index()
    {
        $teknisi = teknisi::all();
        return view('trandis.eksekutor.index')->with('teknisi',$teknisi);
    }

    public function create()
    {
        return view('trandis.eksekutor.create');
    }


    // proses tambah
    function process( Request $request ) {

        $getNama = $request->input('nama');
        $getStatusBekerja   = $request->input('status_bekerja');

        // insert to db 
        $data = array(

            'nama'              => $getNama,
            'status_bekerja'    => $getStatusBekerja,
        );
        
        teknisi::create($data);

        return redirect('teknisi');
    }


    //
    function update( Request $request, $id_teknisi ) {

        $teknisi = teknisi::find( $id_teknisi );

        if ( $teknisi ) {


            $getNama            = $request->input('nama');
            $getStatusBekerja   = $request->input('status_bekerja');

            // insert to db 
            $data = array(

                'nama'              => $getNama,
                'status_bekerja'    => $getStatusBekerja,
            );


            $teknisi->update($data);
            return redirect('teknisi');


        } else return abort(404);
    }
    
function delete( $id_teknisi ) {

    $teknisi = teknisi::find( $id_teknisi );

    if ( $teknisi ) {

        $teknisi->delete();
        return redirect( 'teknisi' )->with('pesan', 'Berhasil terhapus');

    } else {

        return abort(404);
    }
}

}
