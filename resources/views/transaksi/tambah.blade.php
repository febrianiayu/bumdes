@extends('layouts.layoutBumdes')  

@section('content')
  <!-- Horizontal Form -->
          <section class="content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Transaksi</h3><br><br>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ url('/tambah_transaksi')}}">

              {{ csrf_field() }}
              <div class="box-body">
                    <div class="form-group">
                   <label>Nama Petugas Toko</label>
                    <select class="form-control" name="petugas">
                    <option value="">Nama Petugas Toko</option>
                    @foreach($transaksi as $transaksi)
                    <option value="{{ $transaksi->id }}">{{ $transaksi->name}}</option>
                    @endforeach
                    </select>
                    {!! $errors->first('petugas', '<strong class="text-danger">:message</strong>') !!}

                    </div>                
      

              <div class="form-group">
                  <label>Nama Toko</label>
                  <select class="form-control" name="toko">
                  <option value="">Nama Toko</option>
                  @foreach($toko as $toko)
                  <option value="{{ $toko->id}}">{{ $toko->nama_toko}}</option>
                  @endforeach
                  </select>
                  {!! $errors->first('toko', '<strong class="text-danger">:message</strong>') !!}
                   
                </div>
          
                
                
                <div class="form-group field_wrapper">
                   <label>Pesanan  <a href="javascript:void(0);" class="add_button btn btn-info btn-xs" title="Add field">Add items</a></label>
                   
                <br/>
          <div>
                    <select class="" required name="transaksi[]">
                    <option value="">Item</option>
                    @foreach($barang as $transaksi)
                    <option value="{{ $transaksi->id }}">{{ $transaksi->nama_barang}}</option>
                    @endforeach
                    </select>
                    {!! $errors->first('transaksi[]', '<strong class="text-danger">:message</strong>') !!}
                    <input type="text" placeholder="Masukkan Jumlah" required name="field_jumlah[]" value=""/>
                    {!! $errors->first('field_jumlah[]', '<strong class="text-danger">:message</strong>') !!}
                   
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
  var fieldHTML = '<div><select class="" name="transaksi[]"><option value="">Item</option>@foreach($barang as $transaksi)<option value="{{ $transaksi->id }}">{{ $transaksi->nama_barang}}</option>@endforeach</select>&nbsp;<input type="number"  placeholder="Masukkan Jumlah" name="field_jumlah[]" value="" required/>&nbsp;<a href="javascript:void(0);" class="remove_button btn btn-danger btn-sm" title="Remove field"><i class="fa fa-trash"></i></a></div>'; //New input field html
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

<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="transaksi[]"]').on('change',function(){
               var countryID = jQuery(this).val();
               if(countryID)
               {
                  jQuery.ajax({
                     url : '/tambah_transaksi/barang/' +countryID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('input[name="field_jumlah[]"]').empty();
                        jQuery.each(data, function(key,value){
                           $('#otherprocedure').html(' <input type="text" placeholder="Masukkan Harga Jual" name="field_harga[]" value="'+value+'"/>');
                        });
                     }
                  });
               }
               else
               {
                
               }
            });
    });
    </script>
@endsection
