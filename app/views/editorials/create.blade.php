@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Editorial</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'editorials.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('col', 'Col:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('col', Input::old('col'), array('class'=>'form-control', 'placeholder'=>'Col')) }}
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


