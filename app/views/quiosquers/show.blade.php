@extends('layouts.master')

@section('content')

<h1>Show Quiosquer</h1>

<p>{{ link_to_route('quiosquers.index', 'Return to All quiosquers', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Col</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $quiosquer->col }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('quiosquers.destroy', $quiosquer->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('quiosquers.edit', 'Edit', array($quiosquer->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
