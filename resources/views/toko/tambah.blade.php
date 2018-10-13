@extends('layouts.layoutBumdes')  

@section('content')
  <!-- Horizontal Form -->
          <section class="content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Toko</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ url('/tambah_toko')}}"class="form-horizontal">

              {{ csrf_field() }}

              
              <div class="box-body">
               
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Nama Toko</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Masukkan Nama Toko" name="nama_toko">
                    {!! $errors->first('nama_toko', '<strong class="text-danger">:message</strong>') !!}
                  </div>
                </div>
               <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Alamat Toko</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Masukkan Alamat Toko" name="alamat">
                    {!! $errors->first('alamat', '<strong class="text-danger">:message</strong>') !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Pemilik Toko</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="petugas">
                    <option value="">Nama Petugas Toko</option>
                    @foreach($toko as $toko)
                    <option value="{{ $toko->id }}">{{ $toko->name}}</option>
                    @endforeach
                    </select>
                    {!! $errors->first('petugas', '<strong class="text-danger">:message</strong>') !!}
                    </div>
                </div>
               
               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          </section>
@stop