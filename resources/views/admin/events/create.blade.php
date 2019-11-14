@extends('layouts.app')

@section('content')


<div class="container">
        
          
<div class="card">
                <h5 class="card-header">Add New Event</h5>
        <div class="card-body ">
                
        <div class="justify-content-center">
    
    {!! Form::open(['method' => 'POST', 'route' => ['events.store']]) !!}

    <div class="container">
        
      
        <div class="panel-body">
                
           
                <div class="form-group">
                    {!! Form::label('event_name', 'Event Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('event_name', old('event_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('event_name'))
                        <p class="help-block">
                            {{ $errors->first('event_name') }}
                        </p>
                    @endif
                </div>
           
                <div class="col-xs-12 form-group">
                    {!! Form::label('total_capacity', 'Total Capacity*', ['class' => 'control-label']) !!}
                    {!! Form::number('total_capacity', old('total_capacity'),  ['class' => 'form-control editor', 'min'=>'0', 'placeholder' => '', 'required'=>'']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total_capacity'))
                        <p class="help-block">
                            {{ $errors->first('total_capacity') }}
                        </p>
                    @endif
                </div>
            
                <div class="col-xs-12 form-group">
                        
                            
                    {!! Form::label('start_time', 'Start time*', ['class' => 'control-label']) !!}
                    {!! Form::text('start_time', old('start_time'), ['class' => 'form-control datetime', 'placeholder' => '', 'required' => '']) !!}
                   
                    <p class="help-block"></p>
                    @if($errors->has('start_time'))
                        <p class="help-block">
                            {{ $errors->first('start_time') }}
                        </p>
                    @endif
                </div>
           
                <div class="col-xs-12 form-group">
                    {!! Form::label('venue', 'Venue*', ['class' => 'control-label']) !!}
                    {!! Form::text('venue', old('venue'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('venue'))
                        <p class="help-block">
                            {{ $errors->first('venue') }}
                        </p>
                    @endif
                </div>
            
            
        </div>
        <div class="row justify-content-center">
                <div class="col-md-5">
                
                    {!! Form::submit(trans('SUBMIT'), ['class' => 'btn btn-primary btn-block']) !!}
                </div>
                </div>
    </div>
    

    
    {!! Form::close() !!}

</div>
</div>
</div>
{{-- <link rel="stylesheet" href="bootstrap-datetimepicker.min.css">
<script src="bootstrap-datetimepicker.min.js"></script> --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" src="{{ url('extras/build/css') }}/bootstrap-datetimepicker.min.css">  
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
<script src="{{ url('extras/build/js') }}/bootstrap-datetimepicker.min.js"></script>
    <script>
        $('.datetime').datetimepicker({
            format: "{{ config('app.date_format_js') }} HH:mm:ss",
            minDate: new Date()
        });
    </script>
</div>
@stop
{{-- @include('layouts.javascript') --}}
