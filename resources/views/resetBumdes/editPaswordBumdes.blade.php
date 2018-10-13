@extends('layouts.marketing2')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <form method="post" action="{{ url()->current() }}">

            {{ csrf_field() }}

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="password baru" value="{{ $profil->password }}">
                {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
            </div>
                        
            <input type="submit" name="save" value="Update" class="btn btn-md btn-success">
        </form>
    </div>
</div>
@endsection
