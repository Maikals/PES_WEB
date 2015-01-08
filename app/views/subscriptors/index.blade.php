@extends('layouts.master')

@section('content')

<h1>Subscriptors</h1>

<p>{{ link_to_route('subscriptors.create', 'Afegir nou', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($subscriptors->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Adreça</th>
				<th>Nom</th>
				<th>Adreça Enviament</th>
				<th>Accions</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($subscriptors as $subscriptor)
				<tr>
					<td>{{{ $subscriptor->email }}}</td>
					<td>{{{ $subscriptor->nom }}}</td>
					<td>{{{ $subscriptor->adrecaEnviament }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('subscriptors.destroy', $subscriptor->id))) }}
                            {{ Form::submit('Esborra', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('subscriptors.edit', 'Edita', array($subscriptor->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	No hi ha subscriptors
@endif

@stop
