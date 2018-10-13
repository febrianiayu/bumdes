@extends('layouts.layoutBumdes')  

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
          <div class="box-header">
          <a href="tambah_toko" class="btn btn-primary">Tambah</a>
          </div>
          <div class="box-body">
            
            <!-- /.box-header -->
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Toko</th>
                  <th>Alamat Toko</th>
                  <th>Petugas Toko</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $count = 1; ?>
                  @foreach($toko as $data)
                  <tr>
                    <td> {{ $count }} </td>
                    <td> {{ $data->nama_toko}} </td>
                    <td> {{ $data->alamat}} </td>
                    <td> {{ $data->name}} </td>
                    <td>
                      <a href="edit_toko/{{ $data->id}}" class="btn btn-success">Edit</a>
                      <a href="hapus_toko/{{$data->id }}" onclick="return confirm ('Apakah Anda Yakin Menghapus Data ini ?'); " class="btn btn-danger"> Hapus </a>
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