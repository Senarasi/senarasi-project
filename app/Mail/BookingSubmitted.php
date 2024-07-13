<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $guests;
    public $externalguests;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $guests, $externalguests)
    {
        $this->data = $data;
        $this->guests = $guests;
        $this->externalguests = $externalguests;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Submitted',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'bookingroom.email.booking-submitted',
            with: [
                'start' => $this->data['start_time'],
                'end' => $this->data['end_time'],
                'desc' => $this->data['description'],
                'name' => $this->data['name'],
                'email' => $this->data['email'],
                'telephone' => $this->data['telephone'],
                'room_name' => $this->data['room_name'],
            ],
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
