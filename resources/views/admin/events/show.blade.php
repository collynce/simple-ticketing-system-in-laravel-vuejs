@extends('layouts.app')

@section('content')

<div class="container">
        <div class="card">
                <h5 class="card-header">Details</h5>
        <div class="card-body ">
                
        <div class="justify-content-center">

    <div class="panel panel-default">
      

        <div class="panel-body">

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th>Event Name</th>
                            <td>{{ $event->event_name}}</td>
                        </tr>
                        <tr>
                            <th>Attending Capacity</th>
                            <td>{!! $event->total_capacity !!}</td>
                        </tr>
                        <tr>
                            <th>Event Date</th>
                            <td>{{ $event->start_time }}</td>
                        </tr>
                        <tr>
                            <th>Venue/Location</th>
                            <td>{!! $event->venue !!}</td>
                        </tr>
                    </table>
                </div>
            </div>
<hr/>

<h2>Tickets</h2>
<table class="table table-bordered table-striped {{ count($tickets) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>Event Name</th>
                        <th>Ticket Type</th>
                        <th>Total Tickets</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Price per Ticket</th>
                        <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @if (count($tickets) > 0)
            @foreach ($tickets as $ticket)
                <tr data-entry-id="{{ $ticket->id }}">
                    <td>{{ $ticket->event->event_name }}</td>
                                <td>{{ $ticket->ticket_type }}</td>
                                <td>{{ $ticket->amount }}</td>
                                <td>{{ $ticket->available_from }}</td>
                                <td>{{ $ticket->available_to }}</td>
                                <td>{{ $ticket->price }}</td>
                                <td>
                                   
                                    <a href="{{ route('tickets.show',[$ticket->id]) }}" class="btn btn-xs btn-primary">View</a>
                                   
                                    <a href="{{ route('tickets.edit',[$ticket->id]) }}" class="btn btn-xs btn-warning">edit</a>
                                  
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("You are about to delete! Proceed?")."');",
                                        'route' => ['tickets.destroy', $ticket->id])) !!}
                                    {!! Form::submit(trans('Delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">No data</td>
            </tr>
        @endif
    </tbody>
</table>

</div>

            <p>&nbsp;</p>

            <a href="{{ route('events.index') }}" class="btn btn-primary"><< Back</a>
        </div>
    </div>
        
</div>
</div>
</div>
</div>
@stop