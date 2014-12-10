@extends('layouts.master')

@section('content')

<h1>All Editorials</h1>

<p>{{ link_to_route('editorials.create', 'Add New Editorial', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($editorials->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Col</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($editorials as $editorial)
				<tr>
					<td>{{{ $editorial->col }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('editorials.destroy', $editorial->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('editorials.edit', 'Edit', array($editorial->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no editorials
@endif

@stop
