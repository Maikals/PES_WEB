@extends('layouts.master')

@section('content')

<h1>All Vals</h1>

<p>{{ link_to_route('vals.create', 'Add New Val', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($vals->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Data</th>
				<th>Cancelat</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($vals as $val)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no vals
@endif

@stop
