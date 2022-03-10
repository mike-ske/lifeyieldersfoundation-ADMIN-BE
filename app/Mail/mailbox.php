<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Mailbox as ModelsMailbox;
use Illuminate\Contracts\Queue\ShouldQueue;

class mailbox extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $mailing;


    public function __construct(Request $mailing)
    {
        // create mailable property
        $this->mailing = $mailing;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->mailing->subject)
                    ->markdown('emails.mailbox');

        // return $this->markdown('emails.mailbox', [
        //     'subject' => $this->mailing->subject,
        //     'to' => $this->mailing->tomailer,
        // ]);
    }
}
