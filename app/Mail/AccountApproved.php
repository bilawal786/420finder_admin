<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountApproved extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $business;

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
                     ->subject('Your business account has been approved')
                     ->markdown('emails.account-approved')
                     ->with('business', $this->business);

    }
}
