<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class PostTagController extends Controller
{
    public function index($tagId)
    {
        $tag = Tag::findOrfail($tagId);

        return view(
            'posts.index',
            [
                'tag'   => $tag,
                'posts' => $tag->blogPosts()
                    ->with(['user', 'tags', 'mostRecentComment'])
                    ->latest()
                    ->get(),
            ]
        );
    }
}
