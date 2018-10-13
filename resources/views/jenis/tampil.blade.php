@extends('layouts.layoutBumdes')  

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Jenis Barang
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-header">
            <a href="tambah_jenis" class="btn btn-primary">Tambah</a>
            </div>
            <div class="box-body">
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Barang</th>
                  <th>Aksi</th>

                </tr>
                </thead>
                <tbody>
                <?php $count = 1; ?>
                  @foreach($jenis as $data)
                  <tr>
                    <td> {{ $count }} </td>
                    <td> {{ $data->jenis}} </td>
                    <td>
                      <a href="edit_jenis/{{ $data->id}}" class="btn btn-success">Edit</a>
                      <a href="hapus_jenis/{{$data->id }}" onclick="return confirm ('Apakah Anda Yakin Menghapus Data ini ?'); " class="btn btn-danger"> Hapus </a>
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
    <!-- /.content -->
@stop