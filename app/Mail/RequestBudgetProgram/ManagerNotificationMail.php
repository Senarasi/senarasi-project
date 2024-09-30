<?php

namespace App\Mail\RequestBudgetProgram;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ManagerNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $requestBudget;
    public $isResubmission;
    public $pdf;
    public $totalAll;
    public $currentStage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($requestBudget, $isResubmission = false, $pdf, $totalAll, $currentStage)
    {
        $this->requestBudget = $requestBudget;
        $this->isResubmission = $isResubmission;
        $this->pdf = $pdf;
        $this->totalAll = $totalAll;
        $this->currentStage = $currentStage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Budget Request Notification')
                    ->view('requestbudget.program.mail.manager-notification')
                    ->with([
                        'requestBudget' => $this->requestBudget,
                        'isResubmission' => $this->isResubmission,
                        'totalAll' => $this->totalAll,
                        'currentStage' => $this->currentStage,
                    ])
                    ->attachData($this->pdf, 'report.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
