@extends('layouts.master')

@section('content')

<h1>All Administradors</h1>

<p>{{ link_to_route('administradors.create', 'Add New Administrador', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($administradors->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Col</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($administradors as $administrador)
				<tr>
					<td>{{{ $administrador->col }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('administradors.destroy', $administrador->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('administradors.edit', 'Edit', array($administrador->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no administradors
@endif

@stop
