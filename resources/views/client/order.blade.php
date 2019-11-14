@extends('layouts.app')

@section('content')
    {{-- @include('partials.guest.header') --}}
@include('layouts.scripts')

@if(!$tickets->isEmpty())
<script type="text/javascript">
    $(document).ready(function(){
        @foreach($tickets as $ticket)
            $('.ticket-{{ $ticket->id }} .quantity').on('click keyup change blur', function() {
                var quantity = parseInt($('.ticket-{{ $ticket->id }} .quantity').val());
                if(isNaN(quantity)) {
                    quantity = 0;
                    $('.ticket-{{ $ticket->id }} .quantity').val(0);
                } else if (quantity < 0) {
                    quantity = 0;
                    $('.ticket-{{ $ticket->id }} .quantity').val(0);
                } else if (quantity > {{ $ticket->amount }}) {
                    quantity = parseInt({{ $ticket->amount }});
                    $('.ticket-{{ $ticket->id }} .quantity').val({{ $ticket->amount }});
                }
                var subtotal = parseFloat({{ $ticket->price }}) * quantity;
                $('.ticket-{{ $ticket->id }} .subtotal').text(subtotal.toFixed(2));
                $('.ticket-{{ $ticket->id }} .rsubtotal').val(subtotal.toFixed(2));
            });
        @endforeach
        $('.quantity').on('click keyup change blur', function () {
            var sum = 0;
            var collection = { tickets: [] };
            $('.quantity').each(function () {
                var ticket = {};
                ticket['id'] = $(this).data('ticket');
                ticket['amount'] = $(this).val();
                collection.tickets.push(ticket);
            });
            $('.rsubtotal').each(function () {
                sum += Number($(this).val());
                $('.rtotal').val(sum.toFixed(2));
                $('.total').text(sum.toFixed(2));
            });
            $('input[name=tickets]').val(JSON.stringify(collection));
        });
    });
</script>
@endif
<div class="container">

        <div class="card">
                  <h5 class="card-header">Book Ticket</h5>
          <div class="card-body ">
    <section class="content events">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="my-3 p-3 bg-white rounded shadow-sm">
                        <div class="panel-body">

                             <h1>{{ $event->event_name }}</h1>
                            <div>{!! $event->description !!}</div>
                            <div class="event-meta">
                                    To be held on<div class="alert alert-primary"> <span class="label label-default">{{ $event->start_time }}</span></div>
                                    Venue<div class="alert alert-secondary"> <span class="label label-info">{{ $event->venue }}</span></div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="justify-content-end">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            

                            @if(!$tickets->isEmpty())
                            <div class="container">
                                <div class="card">
                                    <div class="card-body">

                                 
                                <h3>Buy Tickets</h3>
                                <p class="alert alert-danger">You can only buy upto a maximum of five tickets.</p>
                                <form action="{{ route('payment') }}" method="POST" id="payment-form">
                                    {{ csrf_field() }}
                                    <table class="table table-tickets">
                                        <thead>
                                            <th>Type</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </thead>
                                        <tbody>
                                            @foreach($tickets as $ticket)
                                                <tr class="ticket-{{ $ticket->id }}">
                                                    <td>{{ $ticket->ticket_type }}</td>
                                                    <td><input
                                                                type="number"
                                                                class="quantity form-control"
                                                                min="0"
                                                                max="5"
                                                                step="1"
                                                                value="0"
                                                                data-ticket="{{ $ticket->id }}">
                                                    </td>
                                                    <td><strong>KSh. {{ $ticket->price }}&nbsp;</strong></td>
                                                    <td>
                                                        <strong class="subtotal">KSh. 0.00</strong><strong>&nbsp;</strong>
                                                        <input
                                                                class="rsubtotal"
                                                                type="hidden" value="0.00"
                                                                disabled>
                                                    </td>
                                                </tr>
                                            @endforeach
                                                <tr class="last">
                                                    <td colspan="3"></td>
                                                    <td><strong class="total">KSh. 0.00</strong><strong>&nbsp;</strong><input type="hidden" name="total" class="rtotal" value="0.00"></td>
                                                </tr>
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="tickets">
                                    
                                        
                                        <div id="card-element"></div>
                                        
                                        @if (session('message'))
                                            <div class="alert alert-success">{{ session('message') }}</div>
                                        @endif
                                        @if (session('error'))
                                            <div class="alert alert-danger">{{ session('error') }}</div>
                                        @endif
                                        <button class="btn btn-success" style="float: right">Buy Ticket</button>
                                  
                                </form>
                            </div>
                            @else
                                <div class="alert alert-warning">We're sorry, but there are no tickets available.<br/> Try again later.</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
          </div>
          </div>
          </div>
@endsection