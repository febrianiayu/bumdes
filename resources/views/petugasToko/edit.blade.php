@extends('layouts.layoutBumdes')  

@section('content')
  <!-- Horizontal Form -->
          <section class="content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Petugas</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ url()->current() }}"class="form-horizontal">

              {{ csrf_field() }}

              
              <div class="box-body">
               
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Nama Petugas</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Masukkan Nama Petugas" name="name"value="{{$user->name}}"> {!! $errors-> first('name', '<p class="help-block">:message</p>')!!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control"placeholder="Masukkan Email" name="email"value="{{$user->email}}"> {!! $errors-> first('email', '<p class="help-block">:message</p>')!!}
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