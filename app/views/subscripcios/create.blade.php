@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Subscripcio</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'subscripcios.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('cancelada', 'Cancelada:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::checkbox('cancelada') }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('dataCancelacio', 'DataCancelacio:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('dataCancelacio', Input::old('dataCancelacio'), array('class'=>'form-control', 'placeholder'=>'DataCancelacio')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('dataFiCreacio', 'DataFiCreacio:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('dataFiCreacio', Input::old('dataFiCreacio'), array('class'=>'form-control', 'placeholder'=>'DataFiCreacio')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('modalitat', 'Modalitat:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('modalitat', Input::old('modalitat'), array('class'=>'form-control', 'placeholder'=>'Modalitat')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('nom', 'Nom:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('preu', 'Preu:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('preu', Input::old('preu'), array('class'=>'form-control', 'placeholder'=>'Preu')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


