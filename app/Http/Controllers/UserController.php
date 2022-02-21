<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use App\Facades\CounterFacade;

class UserController extends Controller
{
    private $counter;

    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(User::class, 'user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        $user->load([
            'blogPosts',
            'blogPosts.user',
            'blogPosts.tags',
            'blogPosts.mostRecentComment',
            'commentsOn',
        ]);

        return view('users.show', [
            'user' => $user,
            'counter' => CounterFacade::increment("user-{$user->id}")
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {
        $user = User::find($user->id);

        $validated = $request->validated();

        $user->fill($validated);
        $user->save();


        if($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars');

            if($user->image) {
                $user->image->path = $path;
                $user->image->save();
            } else {
                $user->image()->save(
                    Image::make(['path' => $path])
                );
            }
        }

        return redirect("/users/{$user->id}")
            ->withStatus('Profile updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
