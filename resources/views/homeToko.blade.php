@extends('layouts.layoutToko')
  <!-- /.head -->
  @section('content')

  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard
        </h1>
    </div>
</div>
<!-- /.row -->

<style>
table { border-collapse: collapse; }
tr { border: none; }
td {
  border-right: solid 3px #FFF; 
  border-left: none;
}	
</style>
<!-- /.row -->

<div class="row">
   <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$transaksiToko}}</h3>

              <p>Jumlah Nama Pembeli</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="tampil_transaksiToko" class="small-box-footer">Info Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$transaksiToko}}</h3>

              <p>Jumlah Transaksi Toko</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="tampil_transaksiToko" class="small-box-footer">Info Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$jumlah}}</h3>

              <p>Total Penjualan</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="#" class="small-box-footer">Total Seluruh Penjualan <i class=""></i></a>
          </div>
        </div>


    














<!-- /.row -->



@endsection
