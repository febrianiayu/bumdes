@extends('layouts.layoutBumdes')  

@section('content')
  <!-- Horizontal Form -->
          <section class="content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Transaksi</h3>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ url()->current() }}">

              {{ csrf_field() }}
        <div class="box-body">
        <div class="form-group">
           <label for="text" class="col-sm-1 control-label">Jumlah</label>
           <div class="col-sm-5">
           <input type="text" class="form-control" placeholder="Masukkan Jumlah" name="jumlah" value="{{$transaksi->jumlah}}">  {!! $errors-> first('jumlah', '<strong class="text-danger">:message</strong>>')!!}
            </div>
        </div>
        </div>
        
         
        <input type="submit" class="btn btn-info pull-right" value="Simpan">
    </form>
</div>
@endsection
