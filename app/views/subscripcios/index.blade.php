@extends('layouts.master')

@section('content')

<h1>Subscripcions</h1>

<p>{{ link_to_route('subscripcios.create', 'Afegir nova', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($subscripcios->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Activa</th>
                <th>Publicació</th>
				<th>Accions</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($subscripcios as $subscripcio)
				<tr>
					<td>
                        @if ($subscripcio->cancelada == false)
                            <span class="glyphicon glyphicon-ok"></span>
                        @else
                            <span class="glyphicon glyphicon-remove"></span>
                        @endif
                    </td>
                    <td>{{{ $subscripcio->nomPublicacio }}}</td>
                    <td>

                        @if ($subscripcio->cancelada == false)
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'GET', 'route' => array('subscripcios.disable', $subscripcio->id))) }}
                            {{ Form::submit('Cancel·la', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        @else
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'GET', 'route' => array('subscripcios.enable', $subscripcio->id))) }}
                            {{ Form::submit('Activa', array('class' => 'btn btn-success')) }}
                        {{ Form::close() }}
                        @endif
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no subscripcios
@endif

@stop
