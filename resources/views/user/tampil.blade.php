@extends('layouts.layoutAdmin')  

@section('content')


<section class="content-header">
      <h1>
        Data Petugas
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
          <div class="box-header">
          <a href="tambah_petugas" class="btn btn-primary">Tambah</a> 
          </div>
            <!-- /.box-header -->
            <div class="box-body">
           
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Petugas</th>
                  <th>Role</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $count = 1; ?>
                  @foreach($user as $data)
                  <tr>
                    <td> {{ $count }} </td>
                    <td> {{ $data->name}} </td>
                    <td> {{ $data->role}} </td>
                    <td> {{ $data->email}} </td>
                    <td>
                      <a href="edit_petugas/{{ $data->id}}" class="btn btn-success">Edit</a>
                      <a href="hapus_petugas/{{$data->id }}" onclick="return confirm ('Apakah Anda Yakin Menghapus Data Ini ?'); " class="btn btn-danger"> Hapus </a>
                      <a href="reset_password/{{ $data->id}}" class="btn btn-warning">Reset Password</a>
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