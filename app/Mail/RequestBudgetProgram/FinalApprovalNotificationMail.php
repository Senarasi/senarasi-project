<?php

namespace App\Mail\RequestBudgetProgram;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FinalApprovalNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $requestBudget;
    public $totalAll;
    public $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($requestBudget, $totalAll, $pdf)
    {
        $this->requestBudget = $requestBudget;
        $this->totalAll = $totalAll;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Budget Request Has Been Fully Approved')
            ->view('requestbudget.program.mail.final-approval-notification')
            ->with([
                'requestBudget' => $this->requestBudget,
                'totalAll' => $this->totalAll,
            ])->attachData($this->pdf, 'report.pdf', [
                'mime' => 'application/pdf',
            ]);;
    }
}
