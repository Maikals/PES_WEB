@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Compra</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($compra, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('compras.update', $compra->id))) }}

        <div class="form-group">
            {{ Form::label('data', 'Data:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('data', Input::old('data'), array('class'=>'form-control', 'placeholder'=>'Data')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('modeEnviamentRecollida', 'ModeEnviamentRecollida:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('modeEnviamentRecollida', Input::old('modeEnviamentRecollida'), array('class'=>'form-control', 'placeholder'=>'ModeEnviamentRecollida')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('compras.show', 'Cancel', $compra->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop