<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Comment;
use App\Models\User;

class CommentPostedOnPostWatched extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $comment;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Comment $comment, User $user)
    {
        $this->comment = $comment;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('admin@laravel.test', 'Admin')
            ->subject("Someone commented your {$this->comment->commentable->title} post!")
            ->markdown('emails.posts.comment-posted-on-watched');
    }
}
