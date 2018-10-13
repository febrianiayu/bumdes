@extends('layouts.layoutBumdes')  

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Gudang
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
           
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <td>Id Barang</td>
                  <td>{{$barang->id_barang}}
                </tr>
                <tr>
                  <td>Nama Barang</td>
                  <td>{{$barang->nama_barang}}
                </tr>
                <tr>
                  <td>Jenis</td>
                  <td>{{$barang->jenis}}
                </tr>
                <tr>
                  <td>Modal</td>
                  <td> Rp. {{ number_format ($barang->modal)}}</td>
                </tr>
                 <tr>
                  <td>Harga Beli</td>
                  <td> Rp. {{ number_format ($barang->harga_beli)}}</td>
                </tr>
                <tr>
                  <td>Harga Jual</td>
                  <td> Rp. {{ number_format ($barang->harga)}}</td>
                </tr>
                <tr>
                  <td>Satuan</td>
                  <td>{{$barang->satuan}}</td>
                </tr>
                <tr>
                  <td>Stok</td>
                  <td>{{$barang->stok}}</td>
                </tr> 
                </thead>
               
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@stop