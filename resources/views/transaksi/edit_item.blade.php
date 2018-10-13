@extends('layouts.layoutBumdes')  

@section('content')
  <!-- Horizontal Form -->
          <section class="content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Transaksi</h3>
            <!-- /.box-header -->
            <!-- form start -->
            </div>  

        <form method="POST" action="{{ url()->current()  }}">
            {{ csrf_field() }}
              
              <div class="box-body">
                <div class="form-group field_wrapper">
                   <label>Project Items  <a href="javascript:void(0);" class="add_button btn btn-primary btn-primary" title="Add field">Add items</a></label>
                <br>
                <div>
                    <select class="" required name="transaksi[]">
                    <option value="">Item</option>
                    @foreach($item1 as $transaksi)
                    <option value="{{ $transaksi->id }}">{{ $transaksi->nama_barang}}</option>
                    @endforeach
                    </select>
                    {!! $errors->first('transaksi[]', '<strong class="text-danger">:message</strong>') !!}
               
                    <input type="text" placeholder="Masukkan Jumlah" required name="field_jumlah[]" value=""/>
                    {!! $errors->first('field_jumlah[]', '<strong class="text-danger">:message</strong>') !!}
        
                   

                </div>
               
            </div>
            <input type="hidden" class="form-control" placeholder="Masukkan Nama Barang" name="id" value="{{$id}}"> 

            <input type="submit" class="btn btn-primary" value="Simpan">
            </div>
        </form>
        <table class="table table-bordered">
            <tr>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Jumlah</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Aksi</th>
            </tr>
            <tbody>
              <?php $count = 1; ?>
                 @foreach($item as $indexKey=>$a)
            <tr>
            <!--     <td>{{ $indexKey+1 }}</td>-->
                <td>{{ $a->created_at }}</td>
                <td>{{ $a->nama_barang}}</td>
                <td>{{ $a->satuan }}</td>
                <td>{{ $a->jumlah }}</td>
                <td>{{ $a->harga_beli }}</td>
                <td>{{ $a->harga }}</td>
                
               
               <td>
                     <a href="/edit_transaksi_detail/detail/{{$a->iddetail}}" class="btn btn-success">Edit</a>
                    <a href="{{ $a->id}}/delete" onclick="return confirm ('Apakah Anda Yakin Menghapus Data Ini ? ');" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
                <?php $count++; ?>
                  @endforeach

            
        </table>
    </div>
</div>
</div>
@endsection
@section('script')
 <script>
$(document).ready(function(){
  var maxField = 999; //Input fields increment limitation
  var addButton = $('.add_button'); //Add button selector
  var wrapper = $('.field_wrapper'); //Input field wrapper
  var fieldHTML = '<div><select class="" name="transaksi[]"><option value="">Item</option>@foreach($item1 as $transaksi)<option value="{{ $transaksi->id }}">{{ $transaksi->nama_barang}}</option>@endforeach</select>&nbsp;<input type="number"  placeholder="Masukkan Jumlah" name="field_jumlah[]" value="" required/>&nbsp;<a href="javascript:void(0);" class="remove_button btn btn-danger btn-sm" title="Remove field"><i class="fa fa-trash"></i></a></div>'; //New input field html
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