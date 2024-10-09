<?php

namespace App\Mail\RequestBudgetProgram;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RejectionNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $requestBudget;
    public $rejectedBy;
    public $reason;
    public $totalAll;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($requestBudget, $rejectedBy, $reason, $totalAll)
    {
        $this->requestBudget = $requestBudget;
        $this->rejectedBy = $rejectedBy;
        $this->reason = $reason;
        $this->totalAll = $totalAll;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Budget Request Has Been Rejected')
                    ->view('requestbudget.program.mail.notif-reject')
                    ->with([
                        'requestBudget' => $this->requestBudget,
                        'rejectedBy' => $this->rejectedBy,
                        'reason' => $this->reason,
                        'totalAll' => $this->totalAll,
                    ]);
    }
}
