<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TokoSave;
use App\Http\Requests\TokoUpdate;
use App\Toko;
use App\User;
use Auth;
use DB;

class TokoController extends Controller
{
    //Fungsi memanggil form tambah toko
    public function add()
    {
        $data4=User::where ('role','=','petugasToko')->get();
    	return view ('toko.tambah')->with('toko',$data4);
    }
    //Fungsi menyimpan tambah toko
    public function save(TokoSave $request)
    {

        $toko= new Toko;
        $toko->nama_toko = $request->nama_toko;
        $toko->alamat = $request->alamat;
        $toko->pemilik_toko =$request->petugas;
       
        $toko->save();

        return redirect('/tampil_toko');
    }
    //Fungsi untuk menampilkan
    public function index()
    {
    	$data=Toko::all();
        $data = DB::table('tokos')
        ->join('users','tokos.pemilik_toko','=', 'users.id')
        ->select('tokos.*', 'users.name', 'tokos.nama_toko', 'tokos.alamat')
        ->get();
    	return view ('toko.tampil')->with('toko',$data);
    }
   

     public function edit($id)
    {
        $data= DB::table('tokos')
        ->join('users', 'tokos.pemilik_toko','=', 'users.id')
        ->where('tokos.id','=',$id)
        ->select('tokos.*', 'users.name','users.id', 'tokos.nama_toko', 'tokos.alamat')
        ->get()->first();
        $data4=User::where ('role','=','petugasToko')->get();
        return view ('toko.edit')
        ->with('toko',$data)
        ->with('user',$data4);
    }

    public function update(TokoUpdate $request,$id)
    {

        $toko= Toko::find($id);

        $toko->nama_toko = $request->nama_toko;
        $toko->alamat = $request->alamat;
        $toko->pemilik_toko =$request->petugas;

        $toko->save();

        return redirect('/tampil_toko');
    }
    public function destroy($id)
    {
        $toko = Toko::findOrFail($id);
        $toko -> delete();
        return redirect('/tampil_toko');
    }
}
