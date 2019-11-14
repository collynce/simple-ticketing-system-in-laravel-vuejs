@extends('layouts.app')

@section('content')
<div class="container">

        <div class="card">
                  <h5 class="card-header">Ticket View</h5>
          <div class="card-body ">

    <div class="panel panel-default">
        

        <div class="panel-body">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Event Name</th>
                            <td>{{ $ticket->event->event_name }}</td>
                        </tr>
                        <tr>
                            <th>Ticket Type</th>
                            <td>{{ $ticket->ticket_type }}</td>
                        </tr>
                        <tr>
                            <th>Ticket Quantity</th>
                            <td>{{ $ticket->amount }}</td>
                        </tr>
                        <tr>
                            <th> Available From</th>
                            <td>{{ $ticket->available_from }}</td>
                        </tr>
                        <tr>
                            <th>Available To</th>
                            <td>{{ $ticket->available_to }}</td>
                        </tr>
                        <tr>
                            <th>Price per Ticket</th>
                            <td>{{ $ticket->price }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('tickets.index') }}" class="btn btn-primary"><< Back</a>
        </div>
    </div>
    </div>
    </div>
    </div>
@stop