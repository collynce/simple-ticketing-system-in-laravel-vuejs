<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTickets extends Model
{
    public function id()
    {
        return $this->belongsTo(Events::class);
    }
}
