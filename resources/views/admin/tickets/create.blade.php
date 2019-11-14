@extends('layouts.app')

@section('content')
<div class="container">

        <div class="card">
                  <h5 class="card-header">Add Ticket</h5>
          <div class="card-body ">
    {!! Form::open(['method' => 'POST', 'route' => ['tickets.store']]) !!}

    <div class="panel panel-default">
      
        <div class="container">
        
        <div class="panel-body">
            
                <div class="col-xs-12 form-group">
                    {!! Form::label('event_id', 'Event*', ['class' => 'control-label']) !!}
                    {!! Form::select('event_id', $events, old('event_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('event_id'))
                        <p class="help-block">
                            {{ $errors->first('event_id') }}
                        </p>
                    @endif
                </div>
           
           
                <div class="col-xs-12 form-group">
                    {!! Form::label('amount', 'Amount of tickets available*', ['class' => 'control-label']) !!}
                    {!! Form::number('amount', old('amount'), ['class' => 'form-control', 'min'=>'0', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('amount'))
                        <p class="help-block">
                            {{ $errors->first('amount') }}
                        </p>
                    @endif
                </div>
       
          
                <div class="col-xs-12 form-group">
                    {!! Form::label('ticket_type', 'Ticket Type*', ['class' => 'control-label']) !!}
                    {!! Form::text('ticket_type', old('ticket_type'), ['class' => 'form-control', 'placeholder' => 'Regular, VIP...', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ticket_type'))
                        <p class="help-block">
                            {{ $errors->first('ticket_type') }}
                        </p>
                    @endif
                </div>
         
            
                <div class="col-xs-12 form-group">
                    {!! Form::label('available_from', 'Available from*', ['class' => 'control-label']) !!}
                    {!! Form::text('available_from', old('available_from'), ['class' => 'form-control datetime', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('available_from'))
                        <p class="help-block">
                            {{ $errors->first('available_from') }}
                        </p>
                    @endif
                </div>
       
            
                <div class="col-xs-12 form-group">
                    {!! Form::label('available_to', 'Available to*', ['class' => 'control-label']) !!}
                    {!! Form::text('available_to', old('available_to'), ['class' => 'form-control datetime', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('available_to'))
                        <p class="help-block">
                            {{ $errors->first('available_to') }}
                        </p>
                    @endif
                </div>
            
           
                <div class="col-xs-12 form-group">
                    {!! Form::label('price', 'Price*', ['class' => 'control-label']) !!}
                    {!! Form::text('price', old('price'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price'))
                        <p class="help-block">
                            {{ $errors->first('price') }}
                        </p>
                    @endif
                </div>
          
            
        </div>
    </div>
</div>
    <div class="row justify-content-center">
            <div class="col-md-5">
            
                {!! Form::submit(trans('SUBMIT'), ['class' => 'btn btn-primary btn-block']) !!}
            </div>
            </div>
    {!! Form::close() !!}

          </div>
          </div>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" src="{{ url('extras/build/css') }}/bootstrap-datetimepicker.min.css">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
