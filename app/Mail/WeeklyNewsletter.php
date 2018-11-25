<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WeeklyNewsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $weeklyAverageData;

    /**
     * Create a new message instance.
     *
     * @param $weeklyAverageData
     */
    public function __construct($weeklyAverageData)
    {
        $this->weeklyAverageData = $weeklyAverageData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newsletters.weekly_newsletter');
    }
}
