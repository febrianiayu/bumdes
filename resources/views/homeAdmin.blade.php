@extends('layouts.layoutAdmin')
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
   <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$user}}</h3>

              <p>Jumlah Petugas Bumdes</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="tampil_petugas" class="small-box-footer">Info Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$user}}</h3>

              <p>Jumlah Petugas Toko</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="tampil_petugasToko" class="small-box-footer">Info Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
     
        


    














<!-- /.row -->



@endsection
