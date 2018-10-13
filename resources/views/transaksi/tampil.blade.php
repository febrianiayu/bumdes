@extends('layouts.layoutBumdes')  

@section('content')


<section class="content-header">
      <h1>
        Data Transaksi
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
          <div class="box-header">
            <form method="post" action="{{ url('/search_transaksi')}}" class="form-horizontal">      
              {{ csrf_field() }}
            <div class="col-sm-3">
              <input type="text" class="form-control" placeholder="Masukkan pencarian" name="search">
              </div>
            <div class="col-md-1">
              <a type="submit" class="btn btn-primary">Cari</a>
            </div>
            <a href="tambah_transaksi" class="btn btn-primary pull-right">Tambah</a>
            </form>
          </div> 
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Transaksi</th>
                  <th>Nama Toko</th>
                  <th>Nama Petugas</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
             
                <?php $count = 1; ?>
                  @foreach($transaksi as $data)
                  <tr>
                    <td> {{ $count }} </td>
                     <td> {{ $data->created_at}} </td>
                    <td> {{ $data->nama_toko}} </td>
                    <td> {{ $data->name}} </td>
                
                  
                   

                    <td>
                      <a href="edit_transaksi/{{ $data->id}}" class="btn btn-success">Edit</a>
                      <a href="detail_transaksi/{{ $data->id}}" class="btn btn-primary">Detail</a>
                      <a href="hapus_transaksi/{{$data->id }}" onclick="return confirm ('Apakah Anda Yakin Menghapus Data Ini ?'); " class="btn btn-danger"> Hapus </a>
                    </td>
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