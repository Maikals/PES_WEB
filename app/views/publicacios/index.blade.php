@extends('layouts.master')

@section('content')

<h1>Publicacions</h1>

<p>{{ link_to_route('publicacios.create', 'Afegir nova', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($publicacios->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Activa</th>
				<th>Nom</th>
				<th>Preu</th>
				<th>Preu Reduït</th>
				<th>Accions</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($publicacios as $publicacio)
				<tr>
					<td>
                        @if ($publicacio->activa == true)
                        <span class="glyphicon glyphicon-ok"></span>
                        @else
                        <span class="glyphicon glyphicon-remove"></span>
                        @endif
                    </td>
					<td>{{{ $publicacio->nom }}}</td>
					<td>{{{ $publicacio->preu }}}</td>
					<td>{{{ $publicacio->preuReduit }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('publicacios.destroy', $publicacio->id))) }}
                            {{ Form::submit('Esborra', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('publicacios.edit', 'Edita', array($publicacio->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no publicacios
@endif

@stop
