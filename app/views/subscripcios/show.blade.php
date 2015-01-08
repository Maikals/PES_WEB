@extends('layouts.master')

@section('content')

<h1>Subscripció</h1>

<p>{{ link_to_route('subscripcios.index', 'Subscripcions', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Cancelada</th>
			<th>DataCancelacio</th>
			<th>DataFiCreacio</th>
			<th>Modalitat</th>
			<th>Nom</th>
			<th>Preu</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $subscripcio->cancelada }}}</td>
				<td>{{{ $subscripcio->dataCancelacio }}}</td>
				<td>{{{ $subscripcio->dataFiCreacio }}}</td>
				<td>{{{ $subscripcio->modalitat }}}</td>
				<td>{{{ $subscripcio->nom }}}</td>
				<td>{{{ $subscripcio->preu }}}</td>
                <td>
                    {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('subscripcios.destroy', $subscripcio->id))) }}
                        {{ Form::submit('Esborra', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                    {{ link_to_route('subscripcios.edit', 'Edita', array($subscripcio->id), array('class' => 'btn btn-info')) }}
                </td>
		</tr>
	</tbody>
</table>

@stop
