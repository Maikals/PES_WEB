@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edita Subscripcio</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($subscripcio, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('subscripcios.update', $subscripcio->id))) }}

        
        <div class="form-group">
            {{ Form::label('idModalitat', 'Modalitat:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::select('idModalitat', $modalitats, null, array('id'=>'idModalitat', 'class' => 'form-control')) }}
            </div>
        </div>



<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Desa', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('subscripcios.index', 'Cancel·la', null, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop