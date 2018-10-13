@extends('layouts.layoutBumdes')  

@section('content')
  <!-- Horizontal Form -->
          <section class="content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Transaksi</h3>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ url()->current() }}"class="form-horizontal">

              {{ csrf_field() }}

             <div class="box-body">
                <div class="form-group">
                  <label>Nama Toko</label>
                  <select class="form-control" name="toko">
                  <option value="">{{$toko1->nama_toko}}</option>
                  @foreach($toko as $toko)
                  <option value="{{ $toko->id}}">{{ $toko->nama_toko}}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Nama Petugas Toko</label>
                  <select class="form-control" name="transaksi">
                  <option value="">{{$user1->name}}</option>
                  @foreach($user as $user)
                  <option value="{{ $user->id }}">{{ $user->name}}</option>
                  @endforeach
                  </select>

                </div>                
      

             
          

            <input type="submit" name="save" class="btn btn-md btn-primary" value="Simpan">
            <a class="btn btn-success" href="{{ url()->current() . '/item' }}">Edit Item</a>
        </form>
    </div>
</div>
              <!-- /.box-body -->
              <div class="box-footer">
                
               
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          </section>
@stop