<?php

namespace App\Listeners;

use App\Events\UserApplicationProcessed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\ProcessedApplicationAlert;

class SendProcessedAlertToUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserApplicationProcessed  $event
     * @return void
     */
    public function handle(UserApplicationProcessed $event)
    {
        // Send Email to admins
        Mail::to($event->application->user->email)->send(new ProcessedApplicationAlert($event->application));
    }
}
