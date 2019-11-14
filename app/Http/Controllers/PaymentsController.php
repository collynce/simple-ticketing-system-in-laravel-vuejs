<?php

namespace App\Http\Controllers;

use App\Booked_tickets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StorePaymentsRequest;
use App\Ticket;
use App\Payments;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Payments as PaymentsResource;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentsRequest $request)
    {
        $requestTotal = round(floatval($request->input('total')), 2);
        $requestTickets = json_decode($request->input('tickets'));
        $user = Auth::user();
        $user_id = $user->id;
        $ids = [];
        // dd($ids);
        foreach ($requestTickets->tickets as $entry) {
            $ids[] = $entry->id;
        }

        $now = Carbon::now()->toDateString();
        // prevent obtaining tickets via crafted request
        $match = [
            ['available_from', '<=', $now],
            ['available_to', '>=', $now]
        ];
        $tickets = Ticket::where($match)->findMany($ids);

        $total = $this->validateTotal($tickets, $requestTickets, $requestTotal);

        $checkusertickets = DB::table('booked_tickets')->where('user_id', $user_id)->sum('tickets_amount');
        if ($checkusertickets < 5) {
            if ($total) {
                return $this->makeTransaction($requestTickets, $total);
                // dd($requestTickets);
            }
            return redirect()->back()->with('error', 'Please review your order and try again.');
        }
        return redirect()->back()->with('error', 'You have reached max number of tickets for this event.');
    }


    public function makeTransaction($requestTickets, $total)
    {
        // dd($total);

        try {
            DB::transaction(function () use ($requestTickets, $total) {
                $user = Auth::user();

                $payment = Payments::create([
                    'user_id' => $user->id,
                    'user_email' => $user->email,
                    'total_paid' => $total

                ]);


                foreach ($requestTickets->tickets as $entry) {
                    $newPaymentsTickets = Booked_tickets::create([
                        'user_id' => $payment->user_id,
                        'payment_id' => $payment->id,
                        'ticket_id' => $entry->id,
                        'tickets_amount' => $entry->amount
                    ]);

                    $ticket = Ticket::findOrFail($entry->id);
                    $ticket->update([
                        'amount' => $ticket->amount - $entry->amount
                    ]);
                }
                $user = Auth::user();
                $email = $user->email;
                $name = $user->name;
                $emaildata = new \stdClass();
                $emaildata->paymentid = $payment->id;
                $emaildata->tickettype = $ticket->ticket_type;
                $emaildata->eventname = $ticket->event->event_name;
                $emaildata->date = $ticket->event->start_time;
                $emaildata->venue = $ticket->event->venue;
                $emaildata->sender = 'Laugh Industry';
                $emaildata->receiver = $name;

                Mail::to($email)->send(new SendEmail($emaildata));
            });
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Your order did not complete. Please try again.');
        }


        return redirect()->back()->with('message', 'Payment completed successfully. A confirmation email has been sent. Check your inbox or spam folders.');
    }

    public function validateTotal($tickets, $requestTickets, $requestTotal)
    {
        $total = 0;
        foreach ($tickets as $ticket) {
            foreach ($requestTickets->tickets as $entry) {
                if ($ticket->id === $entry->id && $ticket->amount > 0 && $ticket->amount >= (int) $entry->amount && (int) $entry->amount > 0) {
                    $total += $ticket->price * $entry->amount;
                }
            }
        }
        $total = round($total, 2);

        if ($total === $requestTotal) {
            return $total;
        }

        return False;
    }

    public function send()
    {

        $user = Auth::user();
        $email = $user->email;
        $name = $user->name;
        $emaildata = new \stdClass();
        $emaildata->demo_one = 'Demo One Value';
        $emaildata->demo_two = 'Demo Two Value';
        $emaildata->sender = 'Laugh Industry';
        $emaildata->receiver = $name;

        Mail::to($email)->send(new SendEmail($emaildata));
    }
}
