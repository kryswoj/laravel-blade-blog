<?php

namespace App\Observers;

use App\Models\Comment;
use Illuminate\Support\Facades\Cache;
use app\Models\BlogPost;

class CommentObserver
{
    public function creating(Comment $comment)
    {
        if ($comment->commentable_type === BlogPost::class) {
            Cache::tags(['blog-post'])->forget("blog-post-{$comment->commentable_id}");
            Cache::tags(['blog-post'])->forget('mostCommented');
        }
    }
}
