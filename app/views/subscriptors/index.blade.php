@extends('layouts.master')

@section('content')

<h1>All Subscriptors</h1>

<p>{{ link_to_route('subscriptors.create', 'Add New Subscriptor', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($subscriptors->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>AdrecaDomicili</th>
				<th>AdrecaEnviament</th>
				<th>Cognom1</th>
				<th>Cognom2</th>
				<th>CompteCorrent</th>
				<th>Contrasenya</th>
				<th>DataNaixement</th>
				<th>Dni</th>
				<th>Email</th>
				<th>EstaBloquejat</th>
				<th>Nom</th>
				<th>TelefonContacte</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($subscriptors as $subscriptor)
				<tr>
					<td>{{{ $subscriptor->adrecaDomicili }}}</td>
					<td>{{{ $subscriptor->adrecaEnviament }}}</td>
					<td>{{{ $subscriptor->cognom1 }}}</td>
					<td>{{{ $subscriptor->cognom2 }}}</td>
					<td>{{{ $subscriptor->compteCorrent }}}</td>
					<td>{{{ $subscriptor->contrasenya }}}</td>
					<td>{{{ $subscriptor->dataNaixement }}}</td>
					<td>{{{ $subscriptor->dni }}}</td>
					<td>{{{ $subscriptor->email }}}</td>
					<td>{{{ $subscriptor->estaBloquejat }}}</td>
					<td>{{{ $subscriptor->nom }}}</td>
					<td>{{{ $subscriptor->telefonContacte }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('subscriptors.destroy', $subscriptor->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('subscriptors.edit', 'Edit', array($subscriptor->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no subscriptors
@endif

@stop
