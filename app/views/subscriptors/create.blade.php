@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Subscriptor</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'subscriptors.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('adrecaDomicili', 'AdrecaDomicili:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('adrecaDomicili', Input::old('adrecaDomicili'), array('class'=>'form-control', 'placeholder'=>'AdrecaDomicili')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('adrecaEnviament', 'AdrecaEnviament:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('adrecaEnviament', Input::old('adrecaEnviament'), array('class'=>'form-control', 'placeholder'=>'AdrecaEnviament')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('cognom1', 'Cognom1:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('cognom1', Input::old('cognom1'), array('class'=>'form-control', 'placeholder'=>'Cognom1')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('cognom2', 'Cognom2:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('cognom2', Input::old('cognom2'), array('class'=>'form-control', 'placeholder'=>'Cognom2')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('compteCorrent', 'CompteCorrent:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('compteCorrent', Input::old('compteCorrent'), array('class'=>'form-control', 'placeholder'=>'CompteCorrent')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Contrasenya:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('password', Input::old('password'), array('class'=>'form-control', 'placeholder'=>'Contrasenya')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('dataNaixement', 'DataNaixement:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('dataNaixement', Input::old('dataNaixement'), array('class'=>'form-control', 'placeholder'=>'DataNaixement')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('dni', 'Dni:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('dni', Input::old('dni'), array('class'=>'form-control', 'placeholder'=>'Dni')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('email', Input::old('email'), array('class'=>'form-control', 'placeholder'=>'Email')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('estaBloquejat', 'EstaBloquejat:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::checkbox('estaBloquejat') }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('nom', 'Nom:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'placeholder'=>'Nom')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('telefonContacte', 'TelefonContacte:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('telefonContacte', Input::old('telefonContacte'), array('class'=>'form-control', 'placeholder'=>'TelefonContacte')) }}
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


