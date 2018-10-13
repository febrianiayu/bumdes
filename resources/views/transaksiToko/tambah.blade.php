@extends('layouts.layoutToko')  

@section('content')
  <!-- Horizontal Form -->
          <section class="content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Transaksi</h3>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ url('/tambah_transaksiToko')}}">

              {{ csrf_field() }}
              
              <div class="box-body">
                <div class="form-group">
                  <label for="text" class="col-sm-12 control-label">Nama Pembeli</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" placeholder="Masukkan Nama Pembeli" name="nama_pembeli">
                    {!! $errors->first('nama_pembeli', '<strong class="text-danger">:message</strong>') !!}
                  </div>
                 </div>
                
                <div class="form-group field_wrapper">
                   <label for="text" class ="col-sm-12 control-label">Pesanan <a href="javascript:void(0);" class="add_button btn btn-info btn-xs" title="Add field">Add items</a></label>
                   
                <br/>

                  <div class="">

                    <select class="" required name="transaksiToko[]">
                    <option value="">Item</option>
                    @foreach($a as $transaksi)
                    <option value="{{ $transaksi->id }}">{{ $transaksi->nama_barang}}</option>
                    @endforeach
                    </select>
                    {!! $errors->first('transaksiToko[]', '<strong class="text-danger">:message</strong>') !!}
                    <input type="number" placeholder="Masukkan Jumlah" required name="field_jumlah[]" value=""/>
                    {!! $errors->first('field_jumlah[]', '<strong class="text-danger">:message</strong>') !!}
                   
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

@endsection
@section('script')
 <script>
$(document).ready(function(){
  var maxField = 999; //Input fields increment limitation
  var addButton = $('.add_button'); //Add button selector
  var wrapper = $('.field_wrapper'); //Input field wrapper
  var fieldHTML = '<div><select class="" name="transaksiToko[]"><option value="">Item</option>@foreach($a as $transaksi)<option value="{{ $transaksi->id }}">{{ $transaksi->nama_barang}}</option>@endforeach</select>&nbsp;<input type="number"  placeholder="Masukkan Jumlah" name="field_jumlah[]" value="" required/>&nbsp;<a href="javascript:void(0);" class="remove_button btn btn-danger btn-sm" title="Remove field"><i class="fa fa-trash"></i></a></div>'; //New input field html
  var x = 1; //Initial field counter is 1

  $(addButton).click(function(){ //Once add button is clicked
    if(x < maxField){ //Check maximum number of input fields
      x++; //Increment field counter
      $(wrapper).append(fieldHTML); // Add field html
    }
  });
  $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
    e.preventDefault();
    $(this).parent('div').remove(); //Remove field html
    x--; //Decrement field counter
  });
});
</script>
@endsection
