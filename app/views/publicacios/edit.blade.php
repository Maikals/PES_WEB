@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Publicacio</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($publicacio, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('publicacios.update', $publicacio->id))) }}

        <div class="form-group">
            {{ Form::label('activa', 'Activa:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::checkbox('activa') }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('dataPublicacio', 'DataPublicacio:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('dataPublicacio', Input::old('dataPublicacio'), array('class'=>'form-control', 'placeholder'=>'DataPublicacio')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('esEnviamentDomicili', 'EsEnviamentDomicili:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::checkbox('esEnviamentDomicili') }}
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
            {{ Form::label('preuReduit', 'PreuReduit:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('preuReduit', Input::old('preuReduit'), array('class'=>'form-control', 'placeholder'=>'PreuReduit')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('publicacios.show', 'Cancel', $publicacio->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop