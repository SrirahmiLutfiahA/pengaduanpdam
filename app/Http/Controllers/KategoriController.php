<?php

namespace App\Http\Controllers;


use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    
    public function index()
    {
        $kategoris = kategori::all();
        return view('admin.kategori.index')->with('kategoris',$kategoris);
    }

    public function create()
    {
        return view('admin.kategori.create');
    }


    // proses tambah
    function process( Request $request ) {

        $getNamaKategori = $request->input('namakategori');
       

        // insert to db 
        $data = array(

            'namakategori'=> $getNamaKategori,
            
        );
        
        kategori::create($data);

        return redirect('kategori');
    }




    function delete( $id ) {

        $kategori = kategori::find( $id );

        if ( $kategori ) {

            $kategori->delete();
            return redirect( 'kategori' )->with('pesan', 'Berhasil terhapus');

        } else {

            return abort(404);
        }
    }

}

