<?php

namespace App\Http\Controllers;

use App\Models\kritiksaran;
use Illuminate\Http\Request;

class KritiksaranController extends Controller
{
    public function index()
    {
        $kritiksarans = kritiksaran::all();
        return view('admin.kritiksaran.index')->with('kritiksarans',$kritiksarans);
    }

    public function create()
    {
        return view('welcome');
    }

    // proses tambah
    function process( Request $request ) {

        $getNama = $request->input('nama');
        $getEmail = $request->input('email');
        $getPesan = $request->input('pesan');
        $getIp    = $request->input('ip');

        // insert to db 
        $data = array(

            'nama'  => $getNama,
            'email' => $getEmail,
            'pesan' => $getPesan,
            'ip'    => $getIp
        );

        kritiksaran::create($data);
        return redirect('/')->with('pesan', 'Terima kasih telah memberikan kami feedback kritik dan saran');
    }


function delete( $id ) {

    $kritiksaran = kritiksaran::find( $id );

    if ( $kritiksaran ) {

        $kritiksaran->delete();
        return redirect( '/kritiksaranindex' )->with('pesan', 'Berhasil terhapus');

    } else {

        return abort(404);
    }
}
}