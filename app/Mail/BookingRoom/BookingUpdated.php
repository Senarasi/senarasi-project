<?php

namespace App\Mail\BookingRoom;

use App\Models\Booking\BookingRoom;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $guests;
    public $externalguests;
    public $meetingLink;


    /**
     * Create a new message instance.
     */
    public function __construct($data, $guests, $externalguests)
    {
        $this->data = $data;
        $this->guests = $guests;
        $this->externalguests = $externalguests;
        $this->meetingLink = $data['meeting_link'];


    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '['.$this->data['br_number']. '] Booking Updated',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'bookingroom.email.booking-updated',
            with: [
                'start' => $this->data['start'],
                'end' => $this->data['end'],
                'desc' => $this->data['desc'],
                'name' => $this->data['name'],
                'email' => $this->data['email'],
                'telephone' => $this->data['telephone'],
                'room_name' => $this->data['room_name'],
                'meetingLink' => $this->meetingLink,

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
