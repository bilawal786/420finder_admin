<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountHidden extends Mailable
{
    use Queueable, SerializesModels;

    protected $business;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($business)
    {
        $this->business = $business;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@420finder.net')
        ->subject('Your business account has been hidden')
        ->markdown('emails.account-hidden')
        ->with('business', $this->business);
    }
}
