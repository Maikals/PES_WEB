@extends('layouts.master')
@section('content')

<div class="login-screen">

	{{ Form::open(array('url' => 'login')) }}
	<div class="form-group">
		<label for="email">Correu electrònic</label>
		<input id="email" name="email" type="text" class="form-control" placeholder="Correu electrònic" value="{{Input::old('email')}}" >
	</div>
	<div class="form-group">
		<label for="password">Contrasenya</label>
		<input id="password" name="password" type="password" class="form-control" placeholder="Contrasenya">
	</div>
	<button type="submit" class="btn btn-primary">Entra</button>

	{{ Form::close() }}

</div>

@stop