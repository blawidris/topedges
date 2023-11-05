<?php

namespace App\Mail\Wallet;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $trans;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($trans)
    {
        $this->trans = $trans;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@topedges.org')->markdown('layouts.emails.wallet.notifyadmin')->with(['trans'=>$this->trans]);
    }
}
