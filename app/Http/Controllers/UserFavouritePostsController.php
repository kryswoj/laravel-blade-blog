<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFavouritePostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('posts.index', [
            'posts' => Auth::user()->favouritePosts,
        ]);
    }

    public function store(Request $request)
    {

        Auth::user()->favouritePosts()->attach($request->post);

        return redirect()->back();
    }

    public function destroy(Request $request)
    {

        Auth::user()->favouritePosts()->detach($request->post);

        return redirect()->back();
    }
}
