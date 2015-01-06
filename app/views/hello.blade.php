@extends('layouts.master')


@section('content')
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>APP</title>
</head>
<body>
	<div class="welcome">
		<h1>Gestió de Subscripcions</h1>
        @if (Session::has('admin'))
        <p>ADMIN</p>
        @else
        <p>USUARI NORMAL</p>
        @endif
	</div>
</body>
</html>
@stop