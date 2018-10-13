@extends('layouts.layoutBumdes')  

@section('content')
  <!-- Horizontal Form -->
          <section class="content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ url()->current() }}"class="form-horizontal">

              {{ csrf_field() }}

              
              <div class="box-body">
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Id Barang</label>


                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Masukkan Id Barang" name="id_barang" value="{{$barang->id_barang}}">
                    {!! $errors-> first('id_barang', '<strong class="text-danger">:message</strong>')!!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Nama Barang</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Masukkan Nama Barang" name="nama_barang" value="{{$barang->nama_barang}}">
                    {!! $errors-> first('nama_barang', '<strong class="text-danger">:message</strong>')!!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Jenis</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="jenis">
                    <option value="{{$barang->id}}">{{$barang->jenis}}</option>
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
                    <input type="text" class="form-control"placeholder="Masukkan Satuan" name="satuan" value="{{$barang->satuan}}">
                    {!! $errors-> first('satuan', '<strong class="text-danger">:message</strong>')!!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Modal</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control"placeholder="Masukkan Modal" name="modal" value="{{$barang->modal}}">
                    {!! $errors-> first('modal', '<strong class="text-danger">:message</strong>')!!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Harga Beli</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Masukkan Harga" name="harga_beli" value="{{$barang->harga_beli}}">
                    {!! $errors-> first('harga_beli', '<strong class="text-danger">:message</strong>')!!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Harga</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Masukkan Harga" name="harga" value="{{$barang->harga}}">
                    {!! $errors-> first('harga', '<strong class="text-danger">:message</strong>')!!}
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Stok</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control"placeholder="Masukkan Stok" name="stok" value="{{$barang->stok}}" >
                    {!! $errors-> first('stok', '<strong class="text-danger">:message</strong>')!!}
                  </div>
                </div>
               









              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                <input type="submit" name="save" value="Simpan" class="btn btn-info pull-right">
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          </section>
@stop