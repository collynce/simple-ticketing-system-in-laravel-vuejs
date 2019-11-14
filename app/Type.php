<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'vip', 'regular'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
