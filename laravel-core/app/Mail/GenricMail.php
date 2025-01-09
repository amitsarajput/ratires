<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class GenricMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData;
    /**
     * Create a new message instance.
     */
    public function __construct( $mailData)
    {
        $this->mailData=$mailData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope 
    {
        return new Envelope(
            subject: $this->mailData['subject']??'Radar Tyres Enquery from '.$this->mailData['name'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.genric-mail',
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
