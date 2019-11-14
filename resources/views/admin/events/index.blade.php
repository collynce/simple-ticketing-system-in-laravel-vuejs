@extends('layouts.app')

@section('content')
<div class="container">

        <div class="card">
                <h5 class="card-header">Curent Events</h5>
        <div class="card-body ">
                
        <div class="justify-content-center">
   
    <p>
        <a href="{{ route('events.create') }}" class="btn btn-success">Create Event</a>
        
    </p>
  

    <div class="panel panel-default">
       

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($events) > 0 ? 'datatable' : '' }} @can('event_delete') dt-select @endcan">
                <thead>
                    <tr>
                       
                            
                      

                        <th>Event Name</th>
                        <th>Attending Capacity</th>
                        <th>Event Date</th>
                        <th>Venue/Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($events) > 0)
                        @foreach ($events as $event)
                            <tr data-entry-id="{{ $event->id }}">
                                
                                

                                <td>{{ $event->event_name }}</td>
                                <td>{{ $event->total_capacity}}</td>
                                <td>{{ $event->start_time }}</td>
                                <td>{!! $event->venue !!}</td>
                                <td>
                                    
                                    <a href="{{ route('events.show',[$event->id]) }}" class="btn btn-xs btn-primary">View</a>
                                  
                                    
                                    <a href="{{ route('events.edit',[$event->id]) }}" class="btn btn-xs btn-warning">Edit</a>
                                    
                                    
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("You are about to delete! Proceed?")."');",
                                        'route' => ['events.destroy', $event->id])) !!}
                                    {!! Form::submit(trans('Delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                  
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">No event entries</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
@stop
