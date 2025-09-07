<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendUserInvite extends Mailable
{
    use Queueable, SerializesModels;
    public $company;
    public $reciever;
    /**
     * Create a new message instance.
     */
    public function __construct($company, $reciever)
    {
        $this->company = $company;
        $this->reciever = $reciever;
        // dd('Control Reached',$this->company,$this->reciever);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: 'testing@test.in',
            subject: 'Invitation to join '.$this->company['name'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.senduserinvite',
            with: [
                'company' => $this->company,
                'reciever' => $this->reciever
            ]
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
