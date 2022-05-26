<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = pelanggan::all();
        return view('admin.pelanggan.index')->with('pelanggans', $pelanggans);
    }

    public function create()
    {
        return view('admin.pelanggan.create');
    }


    // proses tambah
    function process(Request $request)
    {

        $getProfile_id = $request->input('profile_id');
        $getNamalengkap = $request->input('namalengkap');
        $getTelp = $request->input('telp');
        $getAlamat = $request->input('alamat');
        $getNosambungan = $request->input('nosambungan');
        $getBuktipembayaran = $request->input('buktipembayaran');

        // insert to db 
        $data = array(

            'profile_id' => $getProfile_id,
            'namalengkap'    => $getNamalengkap,
            'telp' => $getTelp,
            'alamat' => $getAlamat,
            'nosambungan' => $getNosambungan,
            'buktipembayaran' => $getBuktipembayaran,
        );

        pelanggan::create($data);

        return redirect('pelangganindex');
    }




    function delete($id)
    {

        $pelanggan = pelanggan::find($id);

        if ($pelanggan) {

            $pelanggan->delete();
            return redirect('pelangganindex')->with('pesan', 'Berhasil terhapus');
        } else {

            return abort(404);
        }
    }





    //
    function update(Request $request, $id)
    {

        $pelanggan = pelanggan::find($id);

        if ($pelanggan) {

            $getProfile_id = $request->input('profile_id');
            $getNamalengkap = $request->input('namalengkap');
            $getTelp        = $request->input('telp');
            $getAlamat      = $request->input('alamat');
            $getNosambungan = $request->input('nosambungan');
            $getBuktipembayaran = $request->input('buktipembayaran');

            // insert to db 
            $data = array(

                'profile_id' => $getProfile_id,
                'namalengkap'    => $getNamalengkap,
                'telp' => $getTelp,
                'alamat' => $getAlamat,
                'nosambungan' => $getNosambungan,
                'buktipembayaran' => $getBuktipembayaran,
            );


            $pelanggan->update($data);
            return redirect('pelangganindex');
        } else return abort(404);
    }

    function detail($id)
    {

        $pelanggan = pelanggan::find($id);

        if ($pelanggan) {

            $getProfile_id = 'profile_id';
            $getNamalengkap = 'namalengkap';
            $getTelp        = 'telp';
            $getAlamat      = 'alamat';
            $getNosambungan = 'nosambungan';
            $getBuktipembayaran = 'buktipembayaran';

           
            return redirect('pelangganindex');

        } else return abort(404);
    }
}
