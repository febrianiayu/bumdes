@extends('layouts.layoutBumdes')  

@section('content')
  <!-- Horizontal Form -->
          <section class="content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Profil Bumdes</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" action="{{url()->current() }}"class="form-horizontal">

              {{ csrf_field() }}

              
              <div class="box-body">
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Ganti Nama</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Masukkan Nama
                    " name="name" value="{{$user->name}}">
                     {!! $errors->first('name', '<strong class="text-danger">:message</strong>') !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Ganti Email</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Masukkan Email" name="email" value="{{$user->email}}">
                    {!! $errors->first('email', '<strong class="text-danger">:message</strong>') !!}
                  </div>
                </div>
  
                <div class="form-group">
                  <label for="text" class="col-sm-2 control-label">Ganti Password</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Masukkan Password" name="password" value="">
                     {!! $errors->first('password', '<strong class="text-danger">:message</strong>') !!}
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