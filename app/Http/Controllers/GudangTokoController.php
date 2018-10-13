<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\TransaksiDetail;
use App\Barang;
use App\GudangToko;
use Auth;
use DB;

class GudangTokoController extends Controller
{
    //Fungsi untuk menampilkan
    public function index()
    {
    	 $item = DB::table('gudang_tokos')
            ->join('barangs','gudang_tokos.id_barang', '=', 'barangs.id')
            ->join('users','gudang_tokos.id_user', '=', 'users.id')
            ->where('users.id','=',Auth::user()->id)
            ->select('gudang_tokos.*', 'barangs.nama_barang','barangs.satuan','barangs.harga')
            ->get();

       
    	return view ('gudangToko.tampil')->with('gudangToko',$item);
    }
}
