@extends('layouts.master')

@section('content')

<h1>Subscriptors</h1>

<p>{{ link_to_route('subscriptors.create', 'Afegir nou', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($subscriptors->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Email</th>
				<th>Nom</th>
				<th>Cognom 1</th>
				<th>Cognom 2</th>
				<th>DNI</th>
				<th>Data Naixement</th>
				<th>Adreça Domicili</th>
				<th>Adreça Enviament</th>
				<th>Compte Corrent</th>
				<th>Telèfon Contacte</th>
				<th>Bloquejat</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($subscriptors as $subscriptor)
				<tr>
					<td>{{{ $subscriptor->email }}}</td>
					<td>{{{ $subscriptor->nom }}}</td>
					<td>{{{ $subscriptor->cognom1 }}}</td>
					<td>{{{ $subscriptor->cognom2 }}}</td>
					<td>{{{ $subscriptor->dni }}}</td>
					<td>{{{ $subscriptor->dataNaixement }}}</td>
					<td>{{{ $subscriptor->adrecaDomicili }}}</td>
					<td>{{{ $subscriptor->adrecaEnviament }}}</td>
					<td>{{{ $subscriptor->compteCorrent }}}</td>
					<td>{{{ $subscriptor->telefonContacte }}}</td>
					<td>{{{ $subscriptor->estaBloquejat }}}</td>
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
