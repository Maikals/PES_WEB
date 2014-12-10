@extends('layouts.master')

@section('content')

<h1>All Compras</h1>

<p>{{ link_to_route('compras.create', 'Add New Compra', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($compras->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Data</th>
				<th>ModeEnviamentRecollida</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($compras as $compra)
				<tr>
					<td>{{{ $compra->data }}}</td>
					<td>{{{ $compra->modeEnviamentRecollida }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('compras.destroy', $compra->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('compras.edit', 'Edit', array($compra->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no compras
@endif

@stop
