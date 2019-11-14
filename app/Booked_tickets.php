<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booked_tickets extends Model
{
    protected $fillable = ['user_id', 'payment_id', 'ticket_id', 'tickets_amount'];

    public $timestamps = false;

    public function ticket()
    {
        return $this->belongsToMany('App\Ticket');
    }

    public function payment()
    {
        return $this->belongsToMany('App\Payments');
    }
}
