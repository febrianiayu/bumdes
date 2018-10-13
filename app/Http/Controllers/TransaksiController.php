<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TransaksiSave;
use App\Http\Requests\TransaksiSaveItem;
use App\Http\Requests\TransaksiUpdate;
use App\Http\Requests\TransaksiUpdateDetail;
use App\Transaksi;
use App\TransaksiDetail;
use App\Toko;
use App\Barang;
use Auth;
use App\GudangToko;
use DB;
use App\User;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    //Fungsi memanggil form tambah transaksi
    public function add()
    {   
        $data1=Toko::all();
        $data2=User::where ('role','=','petugasToko')->get();
        $data3=Barang::all();
    	return view ('transaksi.tambah')->with('transaksi',$data2)->with('toko',$data1)->with('barang',$data3);

    }
        public function barang($id)
    {   
        $barang= DB::table('barangs')
        ->where('barangs.id','=', $id)->pluck("harga","id");
       
        return json_encode($barang);

    }
    //Fungsi untuk menyimpan tambah transaksi
    public function save(TransaksiSave $request)
    {
        // dd($request);

        $transaksi= new Transaksi;
        $transaksi->id_toko = $request->toko;
        $transaksi->id_petugasToko = $request->petugas;
        $transaksi->id_petugasBumdes = Auth::user()->id;
        $lt =0;
        $lb =0;
        $s =0;
                 foreach ($request->transaksi as $key=>$iter) {
                    $data = Barang::find($iter);
                    $lt =$lt+(0.6*($data->harga-$data->harga_beli)*$request->field_jumlah[$key]);
                    $lb =$lb+(0.4*($data->harga-$data->harga_beli)*$request->field_jumlah[$key]);
                    $s =$s+(($data->harga_beli*$request->field_jumlah[$key]));
                
                    }
                    $s = $s+$lb;
        $transaksi->laba_toko = $lt;
        $transaksi->laba_bumdes = $lb;
        $transaksi->setoran = $s;
        $transaksi->save();
        $id=$transaksi->id;
                 foreach ($request->transaksi as $key=>$iter) {
                    $barang = Barang::find($iter);

                    $detail = new TransaksiDetail();
                    $detail->id_transaksi = $id;
                    $detail->id_barang = $barang->id;
                    $detail->jumlah = $request->field_jumlah[$key];
                    $detail->harga_beli = $barang->harga_beli;
                    $detail->harga_jual = $barang->harga;
                    $detail->save();
                    }
                


                foreach ($request->transaksi as $key=>$iter){
                    $a= DB::table('gudang_tokos')
                    ->where('gudang_tokos.id_user','=', $request->petugas)
        ->where('gudang_tokos.id_barang', '=', $iter)->get()->first();
        if ($a){
        $tambah= $a= DB::table('gudang_tokos')
        ->where('gudang_tokos.id_user','=', $request->petugas)
        ->where('gudang_tokos.id_barang', '=', $iter)->get()->first();
        $stok = $tambah->stok+$request->field_jumlah[$key];
        
        $update=GudangToko::find($tambah->id);
        $update->stok=$stok;
        $update->save();
        }else
        {
                    $barang = Barang::find($iter);

                    $gudang = new GudangToko();
                    $gudang->id_barang = $barang->id;
                    $gudang->id_user = $request->petugas;
                    $gudang->stok = $request->field_jumlah[$key];
                    $gudang->save();

         }       }
        return redirect('/tampil_transaksi');
    }
    public function addItem($id, Request $request)
    {
        // dd($request);
    
        $total = 0;
            foreach($request->field_price as $add) {
                $total = $total + $add;
            }

         $current_quo = $id;//variabel pembantu
         $bantu=Transaksi::find($id);//variabel pembantu
        $a=$bantu->laba_toko;
        $b=$bantu->laba_bumdes;
            if ($total > 0) {
                foreach ($request->field_name as $key=>$iter) {
                    // dd($labaBumdes);
                    $detail = new TransaksiDetail();    
                    $detail->id_transaksi = $current_quo;
                    $detail->nama = $iter;
                    $detail->harga_beli = $request->field_price[$key];
                    $detail->harga_jual = $request->field_price1[$key];
                    $detail->satuan = $request->field_satuan[$key];
                    $detail->jumlah = $request->field_jumlah[$key];
                    $a= $a+(($request->field_price1[$key] * $request->field_jumlah[$key]-$request->field_jumlah[$key]*$request->field_price[$key]) *0.6);
                    $b= $b+(($request->field_price1[$key] * $request->field_jumlah[$key]-$request->field_jumlah[$key]*$request->field_price[$key]) *0.4);
                    // dd($detail);
                    $detail->save();

                $update=Transaksi::find($current_quo);
                $update->laba_toko=$a;
                $update->laba_bumdes=$b;
                $update->save();
                }
            }
            return redirect('edit_transaksi/' . $id . '/item');
    }
    //Fungsi untuk detail
    public function detail($id)
    {
         $data= DB::table('transaksis')
        ->join('users','transaksis.id_petugasToko', '=', 'users.id')
        ->join('tokos','transaksis.id_toko', '=', 'tokos.id')
        ->where('transaksis.id','=', $id)
        ->select('transaksis.*', 'users.name','tokos.nama_toko','transaksis.laba_bumdes','transaksis.laba_toko','transaksis.setoran')
        ->first();

          $item = DB::table('transaksi_details')
            ->join('barangs','transaksi_details.id_barang', '=', 'barangs.id')
            ->join('transaksis','transaksi_details.id_transaksi', '=', 'transaksis.id')
            ->where('transaksi_details.id_transaksi','=',$id)
            ->select('transaksi_details.*', 'barangs.modal','barangs.nama_barang','transaksi_details.harga_jual','transaksi_details.harga_beli','barangs.satuan','transaksis.setoran')
            ->get();

       
        return view ('transaksi.detail')->with('transaksi',$data)->with('item',$item);
    }
    //Fungsi untuk menampilkan
    public function index()
    {
    	
        $data= DB::table('transaksis')
        ->join('users','transaksis.id_petugasToko', '=', 'users.id')
        ->join('tokos','transaksis.id_toko', '=', 'tokos.id')
        ->select('transaksis.*', 'users.name','tokos.nama_toko')
        ->get();

        return view ('transaksi.tampil')->with('transaksi',$data);
    }

    public function edit($id)
    {  
        $data1=Toko::all();
        $data2=User::where ('role','=','petugasToko')->get();
        $transaksi=Transaksi::find($id);
        $data3=Toko::find($transaksi->id_toko);
        $data4=User::find($transaksi->id_petugasToko);
        return view ('transaksi.edit')->with('user',$data2)->with('toko',$data1)->with('user1',$data4)->with('toko1',$data3);
    }
    
    public function update(TransaksiUpdate $request,$id)
    {
        $transaksi= Transaksi::find($id);
        if($request->toko==""){

        }
        else{
            $transaksi->id_toko = $request->toko;
        }
        if($request->transaksi==""){

        }
        else{
             $transaksi->id_petugasToko = $request->transaksi;
        }
       
        $transaksi->save();

        return redirect('/tampil_transaksi');
    }
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi -> delete();
        return redirect('/tampil_transaksi');
    }
    
        public function saveDetail(Request $request,$id)
        {   

            $data = TransaksiDetail::find($id);
            $data->jumlah = $request->jumlah;
            $data->save();
            return redirect('/tampil_transaksi');

        }

        public function edit_detail($id)
        {
        $data=TransaksiDetail::find($id);
        return view ('transaksi.edit_detail')->with('transaksi',$data);
        }
   
    public function update_detail($id1, $id2, TransaksiUpdateDetail $request)
    {
           $item = TransaksiDetail::find($id2);
        $item->nama = $request->nama;
        $item->satuan = $request->satuan;
        $item->jumlah = $request->jumlah;
        $item->harga_beli= $request->harga_beli;
        $item->harga_jual = $request->harga_jual        ;
        $item->save();

        $total1 = 0;
        $total2 = 0;
        $iter = TransaksiDetail::where('id_transaksi', '=', $id1)->get();
        foreach($iter as $a) {
            $total1 = $total1 + (($a->harga_jual-$a->harga_beli)*$a->jumlah*0.4);
            $total2 = $total2 + (($a->harga_jual-$a->harga_beli)*$a->jumlah*0.6);
        }

        $quo =Transaksi::find($id1);
        $quo->laba_bumdes = $total1;
        $quo->laba_toko = $total2;
        $quo->save();

        return redirect('edit_transaksi/' . $id2 . '/item');
    }
    public function edit_item($id)
    {
         $data= DB::table('transaksi_details')
        ->leftjoin('barangs','transaksi_details.id_barang', '=', 'barangs.id' )
        ->leftjoin('transaksis','transaksi_details.id_transaksi', '=', 'transaksis.id')
        ->where('transaksi_details.id_transaksi','=', $id)
        ->select('barangs.*', 'barangs.nama_barang', 'transaksi_details.jumlah','transaksi_details.id as iddetail')
        ->get();
         
         $barang=Barang::all();
    
        return view ('transaksi.edit_item')->with('item',$data)->with('item1',$barang)->with('id',$id);

    }
       public function updateItem($id, $id_item, Request $request)
    {
        $item = QuotationDetail::where('id', '=', $id_item)->first();
        $item->nama = $request->nama;
        $item->satuan = $request->satuan;
        $item->jumlah = $request->jumlah;
        $item->harga_beli= $request->harga_beli;
        $item->harga_jual = $request->harga_jual        ;
        $item->save();

        $total = 0;
        $iter = QuotationDetail::where('id_quo', '=', $id)->get();
        foreach($iter as $a) {
            $total = $total + $a->harga;
        }

        $quo = Quotation::find($id);
        $quo->price = $total;
        $quo->save();

        return redirect('home/quotation/' . $id . '/edit/item');
    }
        public function destroyItem($id1, $id2)
        {
            $transaksi = TransaksiDetail::findOrFail($id2);
            $transaksi -> delete();
            $total1 = 0;
            $total2 = 0;
            $iter = TransaksiDetail::where('id_transaksi', '=', $id1)->get();
            foreach($iter as $a) {
            $total1 = $total1 + (($a->harga_jual-$a->harga_beli)*$a->jumlah*0.4);
            $total2 = $total2 + (($a->harga_jual-$a->harga_beli)*$a->jumlah*0.6);
        }

        $quo =Transaksi::find($id1);
        $quo->laba_bumdes = $total1;
        $quo->laba_toko = $total2;
        $quo->save();
             return redirect('edit_transaksi/' . $id1 . '/item');
        }
        public function saveItem( TransaksiSaveItem $request)
        {

            $transaksi=Transaksi::find($request->id);
        
        $lt = $transaksi->laba_toko;
        $lb = $transaksi->laba_bumdes;
        $s = $transaksi->setoran;
                 foreach ($request->transaksi as $key=>$iter) {
                    $data = Barang::find($iter);
                    $lt =$lt+(0.6*($data->harga-$data->harga_beli)*$request->field_jumlah[$key]);
                    $lb =$lb+(0.4*($data->harga-$data->harga_beli)*$request->field_jumlah[$key]);
                    $s =$s+(($data->harga_beli*$request->field_jumlah[$key]));
                
                    }
                    $s = $s+$lb;
        $transaksi->laba_toko = $lt;
        $transaksi->laba_bumdes = $lb;
        $transaksi->setoran = $s;
        $transaksi->save();
        $id=$transaksi->id;

                 foreach ($request->transaksi as $key=>$iter) {
                    $barang = Barang::find($iter);

                    $detail = new TransaksiDetail();
                    $detail->harga_beli = $barang->harga_beli;
                    $detail->harga_jual = $barang->harga_jual;
                    $detail->id_transaksi = $id;
                    $detail->id_barang = $barang->id;
                    $detail->jumlah = $request->field_jumlah[$key];
                    $detail->save();
                    }
        return redirect('/edit_transaksi/'.$request->id.'/item');
        }
        public function cari(Request $request)
        {
            $data= DB::table('transaksis')
            ->join('users','transaksis.id_petugasToko', '=', 'users.id')
            ->join('tokos','transaksis.id_toko', '=', 'tokos.id')
            ->select('transaksis.*', 'users.name','tokos.nama_toko')
            ->where('tokos.nama_toko', 'LIKE', '%' . $request->search . '%')
            ->get();

            return view ('transaksi.tampil')->with('transaksi',$data);
        }











   

}
    