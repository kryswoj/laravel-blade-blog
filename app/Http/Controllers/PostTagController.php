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
                'posts' => $tag->blogPosts,
            ]
        );
    }
}
