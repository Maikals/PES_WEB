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
	<div class="row">
	  <div class="col-md-4"></div>
	  <div class="col-md-4"></div>
	  <div class="col-md-4">
		<blockquote>
		  <p>The courage in journalism is sticking up for the unpopular, not the popular.</p>
		  <footer>Geraldo Rivera</footer>
		</blockquote>
		<blockquote>
		  <p>Journalism is literature in a hurry.</p>
		  <footer>Matthew Arnold</footer>
		</blockquote>
		<blockquote>
		  <p>I can't think in terms of journalism without thinking in terms of political ends. Unless there's been a reaction, there's been no journalism. It's cause and effect.</p>
		  <footer>Hunter S. Thompson</footer>
		</blockquote>
		<blockquote>
		  <p>You will always have partial points of view, and you'll always have the story behind the story that hasn't come out yet. And any form of journalism you're involved with is going to be up against a biased viewpoint and partial knowledge.</p>
		  <footer>Margaret Atwood</footer>
		</blockquote></div>
	</div>

</body>
</html>
@stop