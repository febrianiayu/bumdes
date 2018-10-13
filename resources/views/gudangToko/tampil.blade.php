@extends('layouts.layoutToko')  

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
            <a href="tampil_barangToko" class=""></a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Satuan</th>
                  <th>Stok</th>
                  

                </tr>
                </thead>
                <tbody>
                <?php $count = 1; ?>
                  @foreach($gudangToko as $data)
                  <tr>
                    <td> {{ $count }} </td>
              
      
                    <td> {{ $data->nama_barang}} </td>
                    <td> {{ $data->harga}} </td>
                    <td> {{ $data->satuan}} </td>
                    <td> {{ $data->stok}} </td>
                  </tr>
                  <?php $count++; ?>
                  @endforeach 

               
               
               
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