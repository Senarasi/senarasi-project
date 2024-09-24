<?php

namespace App\Mail\RequestBudgetProgram;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NextApproverNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $requestBudget;
    public $nextApprover;
    public $currentStage;
    public $totalAll;
    public $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($requestBudget, $nextApprover, $currentStage, $totalAll, $pdf)
    {
        $this->requestBudget = $requestBudget;
        $this->nextApprover = $nextApprover;
        $this->currentStage = $currentStage;
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
        return $this->subject('Budget Request Approval Needed')
                    ->view('requestbudget.program.mail.next-approver-notification')
                    ->with([
                        'requestBudget' => $this->requestBudget,
                        'nextApprover' => $this->nextApprover,
                        'currentStage' => $this->currentStage,
                        'totalAll' => $this->totalAll,
                    ])
                    ->attachData($this->pdf, 'report.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}