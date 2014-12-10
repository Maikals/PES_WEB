@extends('layouts.master')

@section('content')

<h1>Show Publicacio</h1>

<p>{{ link_to_route('publicacios.index', 'Return to All publicacios', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Activa</th>
				<th>DataPublicacio</th>
				<th>EsEnviamentDomicili</th>
				<th>Nom</th>
				<th>Preu</th>
				<th>PreuReduit</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $publicacio->activa }}}</td>
					<td>{{{ $publicacio->dataPublicacio }}}</td>
					<td>{{{ $publicacio->esEnviamentDomicili }}}</td>
					<td>{{{ $publicacio->nom }}}</td>
					<td>{{{ $publicacio->preu }}}</td>
					<td>{{{ $publicacio->preuReduit }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('publicacios.destroy', $publicacio->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('publicacios.edit', 'Edit', array($publicacio->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
