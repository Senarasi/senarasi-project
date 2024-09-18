<?php

namespace App\Mail\BookingRoom;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExternalGuestNotificationCancelled extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $email;

    /**
     * Create a new message instance.
     */
    public function __construct(Booking $booking, $email)
    {
        $this->booking = $booking;
        $this->email = $email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Cancelled Meeting: '. $this->booking->desc,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'bookingroom.email.externalguestnotif-cancel',
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
