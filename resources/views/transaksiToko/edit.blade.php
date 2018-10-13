@extends('layouts.layoutToko')  

@section('content')
  <!-- Horizontal Form -->
          <section class="content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Transaksi Toko</h3>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ url()->current() }}"class="form-horizontal">

              {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Nama Pembeli</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Masukkan Nama Pembeli" name="nama_pembeli" value="{{$transaksiToko->nama_pembeli}}"> {!! $errors-> first('nama_pembeli', '<strong class="text-danger">:message</strong>')!!}
                  </div>
                </div>

              </div>
             


            <input type="submit" name="save" class="btn btn-md btn-primary" value="Simpan">
            <a class="btn btn-success" href="{{ url()->current() . '/item' }}">Edit Item</a>
        </form>
    </div>
</div>
              <!-- <div class="box-footer">
                
               
              </div> -->
              <!-- /.box-footer -->
            </form>
          </div>
          </section>
@stop