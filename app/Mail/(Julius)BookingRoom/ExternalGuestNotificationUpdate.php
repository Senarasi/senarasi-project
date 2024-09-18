<?php

namespace App\Mail\BookingRoom;

use App\Models\MeetingBooking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExternalGuestNotificationUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $email;

    /**
     * Create a new message instance.
     */
    public function __construct(MeetingBooking $booking, $email)
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
            subject: '['.$this->booking->booking_number. '] Meeting Invitation Updated',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'bookingroom.email.externalguestnotif-update',
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
