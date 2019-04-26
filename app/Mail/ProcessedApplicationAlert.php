<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\LiquorApplication;

class ProcessedApplicationAlert extends Mailable
{
    use Queueable, SerializesModels;
    public $application;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(LiquorApplication $application)
    {
        $this->application = $application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.application.processedapplicationalert');
    }
}
