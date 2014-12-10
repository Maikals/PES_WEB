@extends('layouts.master')

@section('content')

<h1>Show Val</h1>

<p>{{ link_to_route('vals.index', 'Return to All vals', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Data</th>
				<th>Cancelat</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $val->data }}}</td>
					<td>{{{ $val->cancelat }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('vals.destroy', $val->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('vals.edit', 'Edit', array($val->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
