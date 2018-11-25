<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MonthlyNewsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $monthlyAverageData;

    /**
     * Create a new message instance.
     *
     * @param $monthlyAverageData
     */
    public function __construct($monthlyAverageData)
    {
        $this->monthlyAverageData = $monthlyAverageData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newsletters.monthly_newsletter');
    }
}
