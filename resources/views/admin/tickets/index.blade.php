@extends('layouts.app')

@section('content')

<div class="container">

  <div class="card">
            <h5 class="card-header">Tickets</h5>
    <div class="card-body ">
            
    
   
    <p>
        <a href="{{ route('tickets.create') }}" class="btn btn-success">Add Ticket</a>
        
    </p>
   

    <div class="panel panel-default">
       
        
        <div class="panel-body table-responsive">
            sum: {{$tickets->sum('price')}}
            <table class="table table-bordered table-striped {{ count($tickets) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>
                       
                     

                        
                        <th>Event Name</th>
                        <th>Ticket Type</th>
                        <th>No. of Tickets</th>
                        <th>Available From</th>
                        <th>Available Toth>
                        <th>Price Per Ticket</th>
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
        
                                    
                                    <a href="{{ route('tickets.edit',[$ticket->id]) }}" class="btn btn-xs btn-warning">Edit</a>
                                   
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
                            <td colspan="10">No entries available</td>
                        </tr>
                    @endif
                </tbody>
            </table>

         
        </div>
    </div>
    </div>
    </div>
    </div>
    
@stop

@section('javascript') 
    <script>
        @can('ticket_delete')
            window.route_mass_crud_entries_destroy = '{{ route('tickets.mass_destroy') }}';
        @endcan

    </script>
@endsection