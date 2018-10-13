@extends('layouts.Bumdes')
@section('content')
<div class="row">
	<div class="col-lg-12">
	<form method="post" action="{{ url('/resetPetugasToko') }}">
	{{ csrf_field() }}
		<div class="from-group {{ $errors->has('email') ? 'has-error' : ''}}">
		<label>Email</label>
		<input type="text" name="email" class="form-control" placeholder="Alamat Email" value="{{old('email')}}">
		{!! $errors->first('email', '<p class="help-block">:massage</p>') !!}
</div><br />
	<input type="submit" name="resetPassword" value="Reset Password" class="btn btn-md btn-success">
	</from>
</div>
</div>
@endsection