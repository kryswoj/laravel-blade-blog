<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreComment;
use App\Models\BlogPost;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\CommentPosted;

class PostCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store']);
    }

    public function store(BlogPost $post, StoreComment $request)
    {
        $comment = $post->comments()->create([
            'content' => $request->input('content'),
            'user_id' => $request->user()->id,
        ]);

        event(new CommentPosted($comment));

        return redirect()
            ->back()
            ->withStatus('Comment was created!');
    }
}
