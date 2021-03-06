@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Nou Val</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'vals.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('idSubscripcio', 'Subscripció:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::select('idSubscripcio', $subscripcions, null, array('id'=>'idSubscripcio', 'class' => 'form-control')) }}
            </div>
        </div>
        
        <div class="form-group">
            {{ Form::label('dataInici', 'Data inici:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('dataInici', Input::old('dataInici'), array('id'=>'dataInici', 'class'=>'form-control', 'placeholder'=>'Data Inici')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('dataFi', 'Data fi:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('dataFi', Input::old('dataFi'), array('id'=>'dataFi', 'class'=>'form-control', 'placeholder'=>'Data Fi')) }}
            </div>
        </div>

<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Accepta', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {

            $( "#dataInici" ).datepicker({
              defaultDate: "+1w",
              changeMonth: true,
              numberOfMonths: 3,
              minDate: new Date(),
              beforeShowDay: unavailable,
              onClose: function( selectedDate ) {
                $( "#dataFi" ).datepicker( "option", "minDate", selectedDate );
              }
            });
            $( "#dataFi" ).datepicker({
              defaultDate: "+1w",
              changeMonth: true,
              numberOfMonths: 3,
              beforeShowDay: unavailable,
              onClose: function( selectedDate ) {
                $( "#dataInici" ).datepicker( "option", "maxDate", selectedDate );
              }
            });


            var unavailableDates = {
            @foreach ($valDates as $vk => $vd)
              {{$vk}}:[
              @foreach ($vd as $d)
                '{{$d}}',
              @endforeach
              ],
            @endforeach
            };

            function unavailable(date) {
                mdy = (date.getMonth()+1)>9?(date.getMonth()+1):'0'+(date.getMonth()+1);
                mdy = mdy + "/" + (date.getDate()>9?date.getDate():'0'+date.getDate());
                mdy = mdy + "/" + date.getFullYear();

                if ($.inArray(mdy, unavailableDates[$("#idSubscripcio").val()]) == -1) {
                    return [true];
                } else {
                    return [false];
                }
            }

        });
    </script>
@stop

