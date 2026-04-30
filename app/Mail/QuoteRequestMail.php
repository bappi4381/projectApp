<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuoteRequestMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $quoteData;
    public $invoiceId;

    /**
     * Create a new message instance.
     */
    public function __construct($quoteData, $invoiceId)
    {
        $this->quoteData = $quoteData;
        $this->invoiceId = $invoiceId;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Quote Request Details & Invoice - Graphics Studio',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.quote-request',
            with: [
                'quoteData' => $this->quoteData,
                'invoiceId' => $this->invoiceId,
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
