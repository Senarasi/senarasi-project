<?php

namespace App\Mail\BookingRoom;

use App\Models\MeetingBooking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingCancelled extends Mailable
{
    use Queueable, SerializesModels;
    public $booking;
    public $guestUsers;
    public $externalGuests;

    public function __construct(MeetingBooking $booking, $guestUsers, $externalGuests)
    {
        $this->booking = $booking;
        $this->guestUsers = $guestUsers;
        $this->externalGuests = $externalGuests;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '['.$this->booking->br_number. '] Booking Cancelled',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'bookingroom.email.booking-cancelled',
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
