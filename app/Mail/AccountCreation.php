<?php

namespace App\Mail;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccountCreation extends Mailable
{
    use Queueable, SerializesModels;

    /*** Create a new message instance. ***/

    public $information;
    public function __construct($info)
    {
        $this->information = $info; 
    }

    /*** Get the message envelope.*/
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Account Creation at KalkerDeal',
            from: new Address('info@kalkerdeal.com', 'KalkerDeal'),
        );
    }

    /*** Get the message content definition.*/
    public function content(): Content
    {
        return new Content(
            view: 'email.accountcreation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
