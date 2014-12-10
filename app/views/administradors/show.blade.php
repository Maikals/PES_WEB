@extends('layouts.master')

@section('content')

<h1>Show Administrador</h1>

<p>{{ link_to_route('administradors.index', 'Return to All administradors', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Col</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $administrador->col }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('administradors.destroy', $administrador->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('administradors.edit', 'Edit', array($administrador->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
