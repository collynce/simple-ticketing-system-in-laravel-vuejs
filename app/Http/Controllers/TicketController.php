<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
// use App\Providers\EventServiceProvider;

class TicketController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    /**
     * Display a listing of Ticket.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $tickets = Ticket::all();

        return view('admin.tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating new Ticket.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $events = \App\Events::get()->pluck('event_name', 'id')->prepend('Select...', '');

        return view('admin.tickets.create', compact('events'));
    }

    /**
     * Store a newly created Ticket in storage.
     *
     * @param  \App\Http\Requests\StoreTicketsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ticket = Ticket::create($request->all());



        return redirect()->route('tickets.index');
    }


    /**
     * Show the form for editing Ticket.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $events = \App\Events::get()->pluck('event_name', 'id')->prepend('Select...', '');

        $ticket = Ticket::findOrFail($id);

        return view('admin.tickets.edit', compact('ticket', 'events'));
    }

    /**
     * Update Ticket in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->all());



        return redirect()->route('tickets.index');
    }


    /**
     * Display Ticket.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $ticket = Ticket::findOrFail($id);

        return view('admin.tickets.show', compact('ticket'));
    }


    /**
     * Remove Ticket from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('tickets.index');
    }

    /**
     * Delete all selected Ticket at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = Ticket::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
