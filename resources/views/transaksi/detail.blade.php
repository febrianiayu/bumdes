@extends('layouts.layoutBumdes')

@section('heading')
<!-- Page Heading -->
<header class="head">


    <div class="main-bar">
        
    </div>
                            <!-- /.main-bar -->
        </header>

<!-- /.row -->
@endsection

@section('content')


<div class="row">
    <div clas="col-lg-12">
        <table class="table table-hover table-bordered">
            <?php
            $setor=0;
            ?> 
            @foreach($item as $indexKey=>$a)
            <!--     <td>{{ $indexKey+1 }}</td>-->
                 <?php $setor=$setor+ $a->harga_beli*$a->jumlah; ?>
            @endforeach

            <tr>
                <td>Tanggal Transaksi</td>
                <td>{{ $transaksi->created_at }}</td>
            </tr>

            <tr>
                <td>Nama Toko</td>
                <td>{{ $transaksi->nama_toko }}</td>
            </tr>

            <tr>
                <td>Nama Petugas</td>
                <td>{{ $transaksi->name }}</td>
            </tr>
              <tr>
                <td>Laba Bumdes</td>
                <td>Rp. {{ number_format ($transaksi->laba_bumdes) }}</td>
            </tr>
             <tr>
                <td>Laba Toko</td>
                <td>Rp. {{ number_format ($transaksi->laba_toko) }}</td>
            </tr>
            
           
            
               

            <?php
            $total=0;
            ?>
            
            @foreach($item as $indexKey=>$a)
            <?php $total=$total+($a->harga_beli*$a->jumlah)?>
            @endforeach
            <tr>
                <td>Modal</td>
                <td>Rp. {{ number_format ($setor)}}</td>
            </tr>
            <tr>
                <td>Setoran</td>
                <td>Rp. {{ number_format ($transaksi->laba_bumdes+$setor) }}</td>
            </tr>
        </table>

        <h3>Quotation Items</h3>
        <table class="table table-hover table-bordered table-striped">
            <tr>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Jumlah</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>



            </tr>
            @foreach($item as $indexKey=>$a)
            <tr>
            <!--     <td>{{ $indexKey+1 }}</td>-->
                <td>{{ $a->nama_barang}}</td>
                <td>{{ $a->satuan }}</td>
                <td>{{ $a->jumlah }}</td>
                <td> Rp. {{ number_format ($a->harga_beli) }}</td>
                <td>Rp. {{ number_format ($a->harga_jual) }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
