<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BarangSave;
use App\Http\Requests\BarangUpdate;
use App\Barang;
use App\Jenis;
use DB;
use Auth;

class BarangController extends Controller
{
    //Fungsi memanggil form tambah barang
    public function add()
    {
        $data=Jenis::all();
    	return view ('gudang.tambah')->with('jenis',$data);

    }
    // Fungsi menyimpan tambah barang
     public function save(BarangSave $request)
    {
       

        $barang= new Barang;
        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->satuan = $request->satuan;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->jenis = $request->jenis;
        $barang->modal = $request->harga_beli*$request->stok;

        $barang->save();

        return redirect('/tampil_barang');
    }

    // Fungsi untuk menampilkan
    public function index()
    {
    	$data=Barang::all();
    	return view ('gudang.tampil')->with('barang',$data);
    }
    public function edit($id)
    {
        $data= DB::table('barangs')
        ->join('jenis', 'barangs.jenis','=','jenis.id')
        ->where('barangs.id','=',$id)
        ->select('barangs.id_barang','barangs.nama_barang','jenis.jenis','barangs.satuan','barangs.modal','barangs.harga_beli','barangs.harga','barangs.stok','jenis.id')
        ->get()->first();
        $data1=Jenis::all();
        return view ('gudang.edit')->with('barang',$data)->with('jenis',$data1);
    }
    public function detail($id)
    {
        $data=Barang::find($id);
        return view ('gudang.detail')->with('barang',$data);
    }


        public function update(BarangUpdate $request,$id)
    {   

        $barang=Barang::find($id);
        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->satuan = $request->satuan;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->jenis = $request->jenis;
        $barang->modal = $request->modal;

        

        $barang->save();

        return redirect('/tampil_barang');
    }
        public function destroy($id)
        {
            $barang = Barang::findOrFail($id);
            $barang -> delete();
            return redirect('/tampil_barang');
        }
}
