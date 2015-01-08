@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Nova Subscripció</h1>

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

        {{Form::hidden('cancelada', '0')}}
        {{Form::hidden('idSubscriptor', Auth::id())}}

        <div class="form-group">
            {{ Form::label('idPublicacio', 'Publicació:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::select('idPublicacio', $publicacions, null, array('id'=>'idPublicacio', 'class' => 'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('idModalitat', 'Modalitat:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::select('idModalitat', $modalitats, null, array('id'=>'idModalitat', 'class' => 'form-control')) }}
            </div>
        </div>

<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Crear', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


