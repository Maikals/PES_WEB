@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Val</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($val, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('vals.update', $val->id))) }}

        <div class="form-group">
            {{ Form::label('data', 'Data:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('data', Input::old('data'), array('class'=>'form-control', 'placeholder'=>'Data')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('cancelat', 'Cancelat:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::checkbox('cancelat') }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('vals.show', 'Cancel', $val->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop