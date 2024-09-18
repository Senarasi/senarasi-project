<?php

namespace App\Mail\BookingRoom;

use App\Models\Employee;
use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class GuestNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $guest;
    public $meetingLink;


    /**
     * Create a new message instance.
     */
    public function __construct(Booking $booking, Employee $guest,  $meetingLink)
    {
        $this->booking = $booking;
        $this->guest = $guest;
        $this->meetingLink = $meetingLink;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject:  'Meeting Invitation: ' . $this->booking->desc,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'bookingroom.email.guestnotif',
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
