@extends('layouts.master')
@section('content')

<div class="login-screen">

	@if (Session::has('message'))
	<div style="color:red;">
		<p>{{ Session::get('message') }}</p>
	</div>
	@endif

	{{ Form::open(array('url' => 'login')) }}
	<div class="form-group">
		<label for="email">e-mail</label>
		<input id="email" name="email" type="text" class="form-control" placeholder="Your e-mail" value="{{Input::old('email')}}" >
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input id="password" name="password" type="password" class="form-control" placeholder="Your password">
	</div>
	<button type="submit" class="btn btn-primary">Login</button>


	{{ Form::close() }}

</div>

@stop