Hello <i>{{ $sendmail->receiver }}</i>,
<p>This is a confirmation email for your ticket purchase for the event {{$sendmail->eventname}}.</p>

<div>
<p>Payment Id:&nbsp;{{$sendmail->paymentid}}</p>
<p><b>Ticket Type:</b>&nbsp;{{ $sendmail->tickettype }}</p>
<p><b>Event Name:</b>&nbsp;{{ $sendmail->eventname }}</p>
<p><b>Total tickets:</b>&nbsp;{{$sendmail->totaltickets}}</p>
<p>To be held on:&nbsp;{{$sendmail->date}}</p>
<p>Venue/Location:&nbsp;{{$sendmail->venue}}</p>
</div>
 
 
<div>

</div>
 
Thank You,
<br/>
<i>{{ $sendmail->sender }}</i>