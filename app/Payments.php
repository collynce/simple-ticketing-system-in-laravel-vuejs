<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = ['user_id', 'user_email', 'total_paid'];


    public $timestamps = false;


    public function payment()
    {
        return $this->belongsToMany('App\Payments');
    }

    public function ticket()
    {
        return $this->belongsToMany('App\Tickets');
    }
}
