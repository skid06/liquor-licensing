<?php

namespace App\Mail;

use App\Note;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostedCommentByUserAndAdmin extends Mailable
{
    use Queueable, SerializesModels;
    public $note;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Note $note)
    {
        $this->note = $note;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.notes.new-comment-alert');
    }
}
