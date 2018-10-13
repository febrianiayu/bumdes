@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
   
@stop

@section('content')
 <section class="content-header">
      <h1>
        Data Toko
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
                  <th>Nama Toko</th>
                  <th>Alamat Toko</th>
                  <th>Pemilik Toko</th>
                </tr>
                </thead>
                <tbody>
               
                <tr>
                  <td>Toko Makmur</td>
                  <td>Jalan Taman B1 No:4</td>
                  <td>Asyifa Mutiara</td>
                  
                </tr>
                <tr>
                  <td>Toko Subur</td>
                  <td>Jalan Losari 24</td>
                  <td>Tri Wahyu</td>
                </tr>
               
               
                </tbody>
               
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
@stop