<?php

namespace App\Mail;

use App\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
// use Illuminate\Contracts\Mail;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     * 
     */

    public $sendmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sendmail)
    {
        $this->sendmail = $sendmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('ticketorder@laughindustry.co.ke')
            ->view('email.email');
    }
}
