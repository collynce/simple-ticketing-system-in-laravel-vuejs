<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Events;
use App\Ticket;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Resources\GetEvents as GetEventsResource;

class GetEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $events = Events::paginate(10);
        $events = Events::paginate(10);

        return GetEventsResource::collection($events);

        // return view('client.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currentTime = Carbon::now()->toDateString();

        $order = [
            ['event_id', '=', $id],
            ['available_from', '<=', $currentTime],
            ['available_to', '>=', $currentTime]
        ];

        $tickets = Ticket::where($order)->orderBy('price')->get();

        $event = Events::findOrFail($id);

        // return new GetEventsResource(compact('event', 'tickets'));
        return view('client.order', compact('event', 'tickets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
