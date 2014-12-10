@extends('layouts.master')

@section('content')

<h1>All Quioscs</h1>

<p>{{ link_to_route('quioscs.create', 'Add New Quiosc', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($quioscs->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>AdrecaEstabliment</th>
				<th>CompteCorrent</th>
				<th>Nom</th>
				<th>NumQuiosc</th>
				<th>Validat</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($quioscs as $quiosc)
				<tr>
					<td>{{{ $quiosc->adrecaEstabliment }}}</td>
					<td>{{{ $quiosc->compteCorrent }}}</td>
					<td>{{{ $quiosc->nom }}}</td>
					<td>{{{ $quiosc->numQuiosc }}}</td>
					<td>{{{ $quiosc->validat }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('quioscs.destroy', $quiosc->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('quioscs.edit', 'Edit', array($quiosc->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no quioscs
@endif

@stop
