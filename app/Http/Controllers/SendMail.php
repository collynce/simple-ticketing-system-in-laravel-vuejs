<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendMail extends Controller
{
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
