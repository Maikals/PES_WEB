@extends('layouts.master')

@section('content')

<h1>Vals</h1>

<p>{{ link_to_route('vals.create', 'Sol·licitar nou', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($vals->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Data</th>
                <th>Publicació</th>
				<th>Accions</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($vals as $val)
				<tr>
					<td>{{{ $val->data }}}</td>
                    <td>{{{ $val->nomPublicacio }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('vals.destroy', $val->id))) }}
                            {{ Form::submit('Elimina', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no vals
@endif

@stop
