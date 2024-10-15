<?php

namespace App\Mail\DepartmentRequestPayment;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class ManagerNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $departmentRequestPayment;
    public $pdf;

    /**
     * Create a new message instance.
     */
    public function __construct($departmentRequestPayment, $pdf)
    {
        $this->departmentRequestPayment = $departmentRequestPayment;
        $this->pdf = $pdf;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(

            subject: '['.$this->departmentRequestPayment->department_request_payment_number . '] ' .  $this->departmentRequestPayment->user->full_name . ' just requested a payment',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'requestbudget.budgetdepartment.payment.mail.manager-notif',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];


        $fileName = 'Department_Request_Payment_' . $this->departmentRequestPayment->department_request_payment_number. '.pdf';
        // Gunakan Closure untuk memberikan data PDF ke `fromData()`
        $attachments[] = Attachment::fromData(fn() => $this->pdf, $fileName)
        ->withMime('application/pdf');

        if ($this->departmentRequestPayment->file_invoice) {
            $invoiceFilePath = 'storage/' . $this->departmentRequestPayment->file_invoice;

            // Pastikan file invoice ada
            if (Storage::exists($this->departmentRequestPayment->file_invoice)) {
                // Lampirkan file invoice dari path langsung
                $attachments[] = Attachment::fromPath($invoiceFilePath)
                    ->as(basename($invoiceFilePath))
                    ->withMime(Storage::mimeType($this->departmentRequestPayment->file_invoice));
            }
        }
        return $attachments;
    }
}
