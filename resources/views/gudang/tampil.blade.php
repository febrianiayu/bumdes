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
            <div class="box-header">
              <a href="tambah_barang" class="btn btn-primary">Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Id Barang</th>
                  <th>Nama Barang</th>
                  <th>Harga Beli</th>
                  <th>Harga Jual</th>
                  <th>Satuan</th>
                  <th>Stok</th>
                  <th>Status</th>
                  <th>Aksi</th>

                </tr>
                </thead>
                <tbody>
                <?php $count = 1; ?>
                  @foreach($barang as $data)
                  <tr>
                    <td> {{ $count }} </td>
                    <td> {{ $data->id_barang}} </td>
                    <td> {{ $data->nama_barang}} </td>
                    <td> Rp. {{ number_format ($data->harga_beli) }} </td>
                    <td> Rp. {{ number_format ($data->harga) }} </td>
                    <td> {{ $data->satuan}} </td>
                    <td> {{ $data->stok}} </td>
                    @if($data->stok >0 )
                    <td> Tersedia </td>
                    @else
                    <td> Kosong </td>
                    @endif
                    <td>
                      <a href="edit_barang/{{ $data->id}}" class="btn btn-success">Edit</a>
                      <a href="detail_barang/{{ $data->id}}" class="btn btn-primary">Detail</a>
                      <a href="hapus_barang/{{$data->id }}" onclick="return confirm ('Apakah Anda Yakin Menghapus Data ini?'); " class="btn btn-danger"> Hapus </a>
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