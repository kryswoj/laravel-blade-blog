@extends('layouts.app')

@section('content')

<div class="violet col-12" style="border-radius: 0px 0px 50px 0px; min-height:250px; padding-top:2.5%;">
    @include('users._partials.welcome')
</div>
<div class="d-flex">
    <div class="col-md-7 p-5">
        @forelse($user->blogPosts as $post)
            @include('posts._partials.post')
        @empty
            <p class="text-muted">This users haven't got any posts posted.</p>
        @endforelse
    </div>
    <div class="col-md-5 py-5 pe-5">
        @include('comments.create-user-comment')
        @include('comments.showall', ['comments' => $user->commentsOn->take(5)])
    </div>
</div>




    {{--  <div class="row">
        <div class="col-8">
            <div class="d-flex mb-4" >
                <img
                    src="{{
                        $user->image ?
                        $user->image->url() :
                        "https://via.placeholder.com/128/000000/FFFFFF/?text=" . str_replace(' ', '+', $user->name)
                    }}"
                    class="img-thumbnail avatar rounded-circle"
                />
                <div class="d-flex flex-column px-4">
                    <h1>{{ $user->name }}</h3>
                    <p class="text-muted">
                        {{ $user->bio }}
                    </p>
                </div>
            </div>
            <p class="text-muted">Currently viewed by {{ $counter }} users.</p>
            @auth
                @can('update', $user)
                    <a
                        href="{{ route('users.edit', ['user' => $user->id]) }}"
                        class="btn me-2 btn-outline-primary"
                    >
                        Edit profile
                    </a>
                @endcan
            @endauth


            @forelse($user->blogPosts as $key => $post)
                @include('users.posts')
            @empty
                <p class="text-muted">This users haven't got any posts posted.</p>
            @endforelse

        </div>
        <div class="col-4">
            @include('comments.create-user-comment')
            @include('comments.showall', ['comments' => $user->commentsOn])
        </div>
    </div>  --}}
@endsection
