@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Subscriptor</h1>


    </div>
</div>

{{ Form::model($subscriptor, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('subscriptors.update', $subscriptor->id))) }}

<div class="form-group">
    {{ Form::label('adrecaDomicili', 'Adreça del domicili:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('adrecaDomicili', Input::old('adrecaDomicili'), array('class'=>'form-control', 'disabled')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('adrecaEnviament', 'Adreça d\'enviament:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('adrecaEnviament', Input::old('adrecaEnviament'), array('class'=>'form-control', 'disabled')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('cognom1', 'Cognom 1:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('cognom1', Input::old('cognom1'), array('class'=>'form-control', 'disabled')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('cognom2', 'Cognom 2:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('cognom2', Input::old('cognom2'), array('class'=>'form-control', 'disabled')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('compteCorrent', 'Compte corrent:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('compteCorrent', Input::old('compteCorrent'), array('class'=>'form-control', 'disabled')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('dataNaixement', 'Data naixement:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('dataNaixement', Input::old('dataNaixement'), array('class'=>'form-control', 'disabled')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('dni', 'DNI:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('dni', Input::old('dni'), array('class'=>'form-control', 'disabled')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('email', 'Correu electrònic:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('email', Input::old('email'), array('class'=>'form-control', 'disabled')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('nom', 'Nom:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('nom', Input::old('nom'), array('class'=>'form-control', 'disabled')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('telefonContacte', 'Telèfon de contacte:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
        {{ Form::text('telefonContacte', Input::old('telefonContacte'), array('class'=>'form-control', 'disabled')) }}
    </div>
</div>

{{ Form::close() }}

<table class="table table-striped">
	<thead>
		<tr>
			<th>Accions</th>
		</tr>
	</thead>
	<tbody>
		<tr>
            <td>
                {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('subscriptors.destroy', $subscriptor->id), 'onsubmit' => 'return confirmDelete()')) }}
                    {{ Form::submit('Esborra', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
                {{ link_to_route('subscriptors.edit', 'Edita', array($subscriptor->id), array('class' => 'btn btn-info')) }}
            </td>
		</tr>
	</tbody>
</table>
<script>

    function confirmDelete()
    {
        var x = confirm("Segur que vol donar de baixa el seu usuari?");
        if (x)
            return true;
        else
            return false;
    }

</script>

@stop
