@extends('layouts.master')

@section('content')

<h1>All Subscripcios</h1>

<p>{{ link_to_route('subscripcios.create', 'Add New Subscripcio', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($subscripcios->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Cancelada</th>
				<th>DataCancelacio</th>
				<th>DataFiCreacio</th>
				<th>Modalitat</th>
				<th>Nom</th>
				<th>Preu</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($subscripcios as $subscripcio)
				<tr>
					<td>{{{ $subscripcio->cancelada }}}</td>
					<td>{{{ $subscripcio->dataCancelacio }}}</td>
					<td>{{{ $subscripcio->dataFiCreacio }}}</td>
					<td>{{{ $subscripcio->modalitat }}}</td>
					<td>{{{ $subscripcio->nom }}}</td>
					<td>{{{ $subscripcio->preu }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('subscripcios.destroy', $subscripcio->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('subscripcios.edit', 'Edit', array($subscripcio->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no subscripcios
@endif

@stop
