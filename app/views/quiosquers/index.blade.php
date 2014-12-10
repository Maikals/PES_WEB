@extends('layouts.master')

@section('content')

<h1>All Quiosquers</h1>

<p>{{ link_to_route('quiosquers.create', 'Add New Quiosquer', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($quiosquers->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Col</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($quiosquers as $quiosquer)
				<tr>
					<td>{{{ $quiosquer->col }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('quiosquers.destroy', $quiosquer->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('quiosquers.edit', 'Edit', array($quiosquer->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no quiosquers
@endif

@stop
