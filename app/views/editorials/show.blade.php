@extends('layouts.master')

@section('content')

<h1>Show Editorial</h1>

<p>{{ link_to_route('editorials.index', 'Return to All editorials', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Col</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $editorial->col }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('editorials.destroy', $editorial->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('editorials.edit', 'Edit', array($editorial->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
