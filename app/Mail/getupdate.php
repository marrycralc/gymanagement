<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GetUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public $maildat;

    /**
     * Create a new message instance.
     */
    public function __construct($maildat)
    {
        $this->maildat = $maildat;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Get Update')
                    ->view('email')
                    ->with('maildat', $this->maildat);
    }
}
