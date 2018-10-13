@extends('layouts.layoutBumdes')  

@section('content')
  <!-- Horizontal Form -->
          <section class="content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Jenis Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ url('/tambah_jenis')}}"class="form-horizontal">

              {{ csrf_field() }}

              
              <div class="box-body">
                
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Jenis Barang</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Masukkan Jenis Barang" name="jenis">
                    {!! $errors->first('jenis', '<strong class="text-danger">:message</strong>') !!}
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