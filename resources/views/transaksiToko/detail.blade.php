@extends('layouts.layoutToko')

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

            <tr>
                <td>Tanggal Transaksi</td>
                <td>{{ $transaksiToko->created_at }}</td>
            </tr>

            <tr>
                <td>Nama Pembeli</td>
                <td>{{ $transaksiToko->nama_pembeli }}</td>
            </tr>

            <tr>
                <td>Total Belanja</td>
                <td>Rp. {{ number_format($transaksiToko->total_belanja)}}</td>
            </tr>
            
        </table>

        <h3>Quotation Items</h3>
        <table class="table table-hover table-bordered table-striped">
            <tr>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Jumlah</th>
                <th>Harga



            </tr>
            @foreach($item as $indexKey=>$b)
            <tr>
            <!--     <td>{{ $indexKey+1 }}</td>-->
                <td>{{ $b->nama_barang}}</td>
                <td>{{ $b->satuan }}</td>
                <td>{{ $b->jumlah }}</td>
                <td>Rp. {{ number_format($b->harga)}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
