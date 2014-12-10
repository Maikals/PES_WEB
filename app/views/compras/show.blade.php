@extends('layouts.master')

@section('content')

<h1>Show Compra</h1>

<p>{{ link_to_route('compras.index', 'Return to All compras', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Data</th>
				<th>ModeEnviamentRecollida</th>
		</tr>
	</thead>

	<tbody>
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
	</tbody>
</table>

@stop
