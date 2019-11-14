<?php

namespace App;

use App\Http\Resources\Events;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;



    protected $fillable = [
        'event_id', 'amount', 'ticket_type', 'available_from', 'available_to', 'price'
    ];




    public function event()
    {
        return $this->belongsTo('App\Events', 'event_id');
    }
}
