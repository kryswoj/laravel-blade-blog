@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <div class="col-12">
        <div style="background-image: url('{{ $post->image ? $post->image->url() : "https://source.unsplash.com/random/1000×1000"}}');
            min-height: 400px; color: white; text-align: center; background-attachment: fixed; position:relative;">
            <h1

                class="position-absolute start-50 top-50 fw-bold"
                style="text-shadow: 1px 2px #000; font-size:3rem; transform: translate(-50%, -50%)">
                {{ $post->title }}
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mx-auto mt-3">
            <div class="d-flex justify-content-between align-top">
                <div class="mt-1">
                    <x-tags :tags="$post->tags"/>
                </div>
                <div class="d-flex">
                    @auth
                        @can('update', $post)
                            <a
                                href="{{ route('posts.edit', ['post' => $post->id]) }}"
                                class="btn btn-outline-secondary me-2"
                            >
                                Edit
                            </a>
                        @endcan
                        @if(!$post->trashed())
                            @can('delete', $post)
                                <form action="{{ route('posts.destroy', ['post'=> $post->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-outline-secondary" type="submit">Delete</button>
                                </form>
                            @endcan
                        @endif
                    @endauth
                </div>

            </div>
            <p class="mt-4 text-dark" style="word-break: break-all;">{{ $post->content }}</p>

            <p class="text-dark">Added {{ $post->created_at->diffForHumans() }},<br>
                by <a class="text-dark" href="{{ route('users.show', ['user' => $post->user->id]) }}">{{ $post->user->name }}</a></p>


            <h4 class="text-dark">Comments</h4>

            @include('comments.create', ['text' => "How you feel after reading this?"])
            @include('comments.showall', ['comments' => $post->comments])
        </div>

    </div>
@endsection
