<?php

namespace App\Listeners;

use App\Events\NewApplication;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\NewApplicationAlert;
use App\Admin;

class SendAlertToAdmin
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
     * @param  NewApplication  $event
     * @return void
     */
    public function handle(NewApplication $event)
    {
        $admins = Admin::all();

        $admin_emails = array();
        
        foreach($admins as $admin){
            array_push($admin_emails, $admin->email);
        }

        // Send Email to admins
        Mail::to($admin_emails)->send(new NewApplicationAlert($event->application));
    }
}
