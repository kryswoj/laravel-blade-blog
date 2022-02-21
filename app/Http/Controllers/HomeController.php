<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BlogPost;

class HomeController extends Controller
{
    public function home()
    {

        return view('posts.index', [
            'posts' => BlogPost::with(['user', 'tags', 'mostRecentComment'])->latest()->get(),
        ]);
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function secret()
    {
        return view('home.secret');
    }
}
