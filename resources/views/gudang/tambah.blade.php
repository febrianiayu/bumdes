@extends('layouts.layoutBumdes')  

@section('content')
  <!-- Horizontal Form -->
          <section class="content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ url('/tambah_barang')}}"class="form-horizontal">

              {{ csrf_field() }}

              
              <div class="box-body">
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Id Barang</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Masukkan Id Barang" name="id_barang">
                     {!! $errors->first('id_barang', '<strong class="text-danger">:message</strong>') !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Nama Barang</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Masukkan Nama Barang" name="nama_barang">
                    {!! $errors->first('nama_barang', '<strong class="text-danger">:message</strong>') !!}
                  </div>
                </div>
               <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Jenis</label>
                 


                  <div class="col-sm-10">
                    <select class="form-control" name="jenis">
                    <option value="">Jenis Barang</option>
                    @foreach($jenis as $jenis)
                    <option value="{{ $jenis->id }}">{{ $jenis->jenis }}</option>
                    @endforeach
                    </select>
                     {!! $errors->first('jenis', '<strong class="text-danger">:message</strong>') !!}

                  </div>
                </div>
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Satuan</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Masukkan Satuan" name="satuan">
                     {!! $errors->first('satuan', '<strong class="text-danger">:message</strong>') !!}
                  </div>
                </div>
                 <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Harga Beli</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" placeholder="Masukkan Harga Beli" name="harga_beli">
                     {!! $errors->first('harga_beli', '<strong class="text-danger">:message</strong>') !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Harga Jual</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" placeholder="Masukkan Harga Jual" name="harga">
                     {!! $errors->first('harga', '<strong class="text-danger">:message</strong>') !!}
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Stok</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control"placeholder="Masukkan Stok" name="stok">
                     {!! $errors->first('stok', '<strong class="text-danger">:message</strong>') !!}
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