@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edita subscriptor</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($subscriptor, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('subscriptors.update', $subscriptor->id))) }}

        <div class="form-group">
            {{ Form::label('adrecaDomicili', 'Adreça del domicili:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('adrecaDomicili', Input::old('adrecaDomicili'), array('class'=>'form-control', 'placeholder'=>'Adreça del domicili')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('adrecaEnviament', 'Adreça d\'enviament:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('adrecaEnviament', Input::old('adrecaEnviament'), array('class'=>'form-control', 'placeholder'=>'Adreça d\'enviament')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('cognom1', 'Cognom 1:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('cognom1', Input::old('cognom1'), array('class'=>'form-control', 'placeholder'=>'Cognom 1')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('cognom2', 'Cognom 2:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('cognom2', Input::old('cognom2'), array('class'=>'form-control', 'placeholder'=>'Cognom 2')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('compteCorrent', 'Compte corrent:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('compteCorrent', Input::old('compteCorrent'), array('class'=>'form-control', 'placeholder'=>'Compte corrent')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('dataNaixement', 'Data naixement:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('dataNaixement', Input::old('dataNaixement'), array('class'=>'form-control', 'placeholder'=>'Data naixement')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('dni', 'DNI:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('dni', Input::old('dni'), array('class'=>'form-control', 'placeholder'=>'DNI')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Correu electrònic:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('email', Input::old('email'), array('class'=>'form-control', 'placeholder'=>'Correu electrònic', 'disabled')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('nom', 'Nom:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('telefonContacte', 'Telèfon de contacte:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('telefonContacte', Input::old('telefonContacte'), array('class'=>'form-control', 'placeholder'=>'Telèfon de contacte')) }}
            </div>
        </div>

<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Desa', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('subscriptors.show', 'Cancel·la', $subscriptor->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop