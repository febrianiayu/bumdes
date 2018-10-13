<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\JenisSave;
use App\Http\Requests\JenisUpdate;
use App\Jenis;
use Auth;

class JenisController extends Controller
{
    //
    public function index()
    {
    	$data=Jenis::all();
    	return view ('jenis.tampil')-> with('jenis',$data);
    }
    public function add()
    {
    	return view ('jenis.tambah');
    }
    public function save(JenisSave $request)
    {

        $jenis= new Jenis;
        $jenis->jenis = $request->jenis;
        

        $jenis->save();

        return redirect('/tampil_jenis');
    }
    public function update(JenisUpdate $request,$id)
    {

        $jenis= Jenis::find($id);
        $jenis->jenis = $request->jenis;
        

        $jenis->save();

        return redirect('/tampil_jenis');
    }
    public function edit($id)
    {
        $data=Jenis::find($id);
        return view ('jenis.edit')->with('jenis',$data);
    }
    public function destroy($id)
    {
        $toko = Jenis::findOrFail($id);
        $toko -> delete();
        return redirect('/tampil_jenis')->with('alert-success', 'Data Berhasil di Hapus.');
    }
}
