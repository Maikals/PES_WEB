@extends('layouts.master')

@section('content')

<h1>Show Subscriptor</h1>

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
            @if (Session::has('admin'))
                <th>Bloquejat</th>
            @endif
		</tr>
	</thead>

	<tbody>
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
                    @if (Session::has('admin'))
					    <td>{{{ $subscriptor->estaBloquejat }}}</td>
                    @endif
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('subscriptors.destroy', $subscriptor->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('subscriptors.edit', 'Edit', array($subscriptor->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
