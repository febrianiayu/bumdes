<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TransaksiTokoSave;
use App\Http\Requests\TransaksiTokoUpdate;
use App\Http\Requests\TransaksiTokoUpdateItem;
use App\Http\Requests\TransaksiTokoUpdateDetail;
use App\TransaksiToko;
use App\GudangToko;
use App\Barang;
use App\TransaksiDetailToko;
use DB;
use Auth;
use App\User;
use Carbon\Carbon;

class TransaksiTokoController extends Controller
{
    //Fungsi untuk menampilkan
    public function add()
    {
         $item = DB::table('gudang_tokos')
            ->join('barangs','gudang_tokos.id_barang', '=', 'barangs.id')
            ->join('users','gudang_tokos.id_user', '=', 'users.id')
            ->where('users.id','=',Auth::user()->id)
            ->select('barangs.nama_barang','barangs.id')
            ->get();
    	return view ('transaksiToko.tambah')->with('a',$item);
    }
    public function index()
    {
        $data=TransaksiToko::all();
        return view ('transaksiToko.tampil')->with('transaksiToko',$data);
    }
    public function save(TransaksiTokoSave $request)
    {
            $transaksiToko= new TransaksiToko;
            $transaksiToko->nama_pembeli = $request->nama_pembeli;
            $total =0;
                    foreach ($request->transaksiToko as $key=>$iter) {
                        $data = Barang::find($iter);
                        $total = $total+(($data->harga*$request->field_jumlah[$key]));
                    }
            $transaksiToko->total_belanja = $total;
            $transaksiToko->save();

                foreach ($request->transaksiToko as $key=>$iter){
                    $data= Barang::find($iter);
                    $detail = new TransaksiDetailToko();
                    $detail->id_transaksiToko=$transaksiToko->id;
                    $detail->id_barang = $data->id;
                    $detail->harga = $data->harga;
                    $detail->jumlah = $request->field_jumlah[$key];
                    $detail->save();
                }
                return redirect('/tampil_transaksiToko');
    }
    public function edit($id)
    {
        $data=TransaksiToko::find($id);
        return view('transaksiToko.edit')->with('transaksiToko',$data);
    }
    public function update(TransaksiTokoUpdate $request,$id)
    {
        $transaksiToko= TransaksiToko::find($id);
        $transaksiToko->nama_pembeli = $request->nama_pembeli;
        $transaksiToko->save();

        return redirect('/tampil_transaksiToko');
    }
    public function destroy($id)
    {
        $data = TransaksiToko::findOrFail($id);
        $data -> delete();
        return redirect('/tampil_transaksiToko');
    }
    public function edit_item($id)
    {
        $data= DB::table('transaksi_tokos')
        ->join('transaksi_detail_tokos','transaksi_detail_tokos.id_transaksiToko','=','transaksi_tokos.id')
        ->join('barangs','transaksi_detail_tokos.id_barang','=','barangs.id')
        ->where('transaksi_tokos.id','=',$id)
        ->select('barangs.nama_barang','barangs.satuan','barangs.satuan','barangs.harga','transaksi_detail_tokos.id as idtrans','transaksi_detail_tokos.jumlah','transaksi_tokos.nama_pembeli','transaksi_tokos.created_at','transaksi_detail_tokos.id')->get();
         $item = DB::table('gudang_tokos')
            ->join('barangs','gudang_tokos.id_barang', '=', 'barangs.id')
            ->join('users','gudang_tokos.id_user', '=', 'users.id')
            ->where('users.id','=',Auth::user()->id)
            ->select('barangs.nama_barang','barangs.id')
            ->get();
        return view('transaksiToko.edit_item')->with('a',$data)->with('id',$id)->with('apa',$item);
    }
    public function addItem(TransaksiTokoUpdateItem $request)
    {
        foreach($request->transaksiToko as $key=>$iter ){
      $barang = Barang::find($iter);
        $detail = new TransaksiDetailToko();
        $detail->id_transaksiToko= $request->id;
        $detail->harga= $barang->harga;
        $detail->id_barang= $iter;
        $detail->jumlah = $request->field_jumlah[$key];
        $detail->save();

        $data = TransaksiToko::find($request->id);
        $z = $data->total_belanja+($barang->harga*$request->field_jumlah[$key]);
        $data->total_belanja=$z;
        $data->save();

        }
        return redirect('/edit_transaksiToko/'.$request->id.'/item');
    }
    public function detail($id)
    {
        $data= DB::table('transaksi_tokos')
        ->join('transaksi_detail_tokos','transaksi_detail_tokos.id_transaksiToko','=','transaksi_tokos.id')
        ->join('barangs','transaksi_detail_tokos.id_barang','=','barangs.id')
        ->where('transaksi_tokos.id','=',$id)
        ->select('barangs.nama_barang','barangs.satuan','barangs.harga','transaksi_detail_tokos.jumlah','transaksi_tokos.nama_pembeli','transaksi_tokos.created_at','transaksi_tokos.total_belanja')->get()->first();


        $item =  DB::table('transaksi_detail_tokos')
        ->join('transaksi_tokos','transaksi_tokos.id','=','transaksi_detail_tokos.id_transaksiToko')
        ->join('barangs','transaksi_detail_tokos.id_barang','=','barangs.id')
        ->where('transaksi_detail_tokos.id_transaksiToko','=',$id)
        ->select('barangs.nama_barang','barangs.satuan','barangs.harga','transaksi_detail_tokos.jumlah')
        ->get();
        return view('transaksiToko.detail')->with('transaksiToko',$data)->with('id',$id)->with('item',$item);
    }
    public function edit_detail($id1, $id2)
    {   
        $data=TransaksiDetailToko::find($id2);
        return view('transaksiToko.edit_detail')->with('transaksiToko',$data);
    }
    public function saveDetail(TransaksiTokoUpdateDetail $request,$id1,$id2)
    {
        $data = TransaksiDetailToko::find($id2);
        $data->jumlah = $request->jumlah;
        $data->save();

        $edit = DB::table('transaksi_detail_tokos')
        ->where('transaksi_detail_tokos.id_transaksiToko','=',$id1)
        ->get();
        $a=0;
        foreach ($edit as $iter ){
            $a=$a+($iter->jumlah*$iter->harga);
        }

        $transaksiToko=TransaksiToko::find($id1);
        $transaksiToko->total_belanja=$a;
        $transaksiToko->save();
        

        return redirect('/edit_transaksiToko/'.$id1.'/item');
    }
    public function destroyItem($id1, $id2)
    {
        $delete = TransaksiDetailToko::findOrFail($id2);
        $delete -> delete();

        $edit = DB::table('transaksi_detail_tokos')
        ->where('transaksi_detail_tokos.id_transaksiToko','=',$id1)
        ->get();
        $a=0;
        foreach ($edit as $iter ){
            $a=$a+($iter->jumlah*$iter->harga);
        }

        $transaksiToko=TransaksiToko::find($id1);
        $transaksiToko->total_belanja=$a;
        $transaksiToko->save();

        return redirect('/edit_transaksiToko/'.$id1.'/item');


    }
     public function cari(Request $request)
        {
            $data=TransaksiToko::where('transaksi_tokos.nama_pembeli', 'LIKE', '%' . $request->search . '%')
            ->get();
            return view ('transaksiToko.tampil')->with('transaksiToko',$data);
        }


}
