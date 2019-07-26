<?php

namespace App\Listeners;

use Mail;
use App\Note;
use App\Admin;
use App\User;
use App\LiquorApplication;
use App\Events\UserAndAdminPostComment;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\PostedCommentByUserAndAdmin;

class CommentNotificationsForUserAndAdmin
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
     * @param  UserAndAdminPostComment  $event
     * @return void
     */
    public function handle(UserAndAdminPostComment $event)
    {
        if($event->note->admin_id != null){
            // make a query to liquor_application table by the return note's application_id
            $application = LiquorApplication::where('id', $event->note->application_id)->first();

            // make a query to user table by the applications' id from above codes
            $user = User::where('id', $application->user_id)->first();

            Mail::to($user->email)->send(new PostedCommentByUserAndAdmin($event->note));
        }
        elseif($event->note->user_id != null){
            // get all admin_idd in the notes by application id
            // $admin_ids = Note::select('admin_id')->distinct()->where('application_id', $event->note->application_id)->where('admin_id','!=', NULL)->get();

            // make a query to admin table by all admin_id from above codes
            // $admins = Admin::whereIn('id', $admin_ids)->get();
            $admins = Admin::get();
            
            $admin_emails = array();
        
            foreach($admins as $admin){
                array_push($admin_emails, $admin->email);
            }            

            Mail::to($admin_emails)->send(new PostedCommentByUserAndAdmin($event->note));            
        }      
    }
}
