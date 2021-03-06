<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    private $data = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('From Akim Portfolio')
            ->markdown('emails.tmpl', [

                'msg' => $this->data['message'],
                'user' => $this->data['name'],
                'email' => $this->data['email'],
                'tel' => $this->data['tel'],

            ]);

    }
}
