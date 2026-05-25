<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistredMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $client;
    private $url;

    public function __construct( $client, $url )
    {
        $this->client = $client;
        $this->url    = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.registred')->subject("Message d'inscription")->with([
            'client' => $this->client,
            'url'    => $this->url
        ]);
    }
}
