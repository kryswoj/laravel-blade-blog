@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <div class="row">
        <div class="col-8">
            @if ($post->image)
            <div style="background-image: url('{{ $post->image->url() }}'); min-height: 200px; color: white; text-align: center; background-attachment: fixed;">
                <h1 style="padding-top: 100px; text-shadow: 1px 2px #000">
            @else
                <h1>
            @endif

            {{ $post->title }}

            @if ($post->image)
                </h1>
            </div>
            @else
            </h1>
            @endif

            <p>{{ $post->content }}</p>
            {{-- <img src="{{ asset($post->image->path) }}"/> --}}
            {{-- <img src="{{ Storage::url($post->image->path) }}"/> --}}
            {{-- <img src="{{ $post->image->url() }}"> --}}
            <p>Added {{ $post->created_at->diffForHumans() }},<br> 
                by <a href="{{ route('users.show', ['user' => $post->user->id]) }}">{{ $post->user->name }}</a></p>

            @if(now()->diffInMinutes($post->created_at) < 5)
                <x-alert>
                    Brand new post!
                </x-alert>
            @endif

            <x-tags :tags="$post->tags"/>

            <p class="small text-muted">Currently read by {{ $counter }} people.</p>

            <h4>Comments</h4>

            @include('comments.create')

            @forelse($post->comments as $comment)
                <p>
                    {{ $comment->content }}, <br>
                    <span class="text-muted">
                        added {{ $comment->created_at->diffForHumans() }},<br>
                        by <a href="{{ route('users.show', ['user' => $comment->user->id]) }}">{{ $comment->user->name }}</a>
                    </span>
                </p>

            @empty
                <p>No comments yet.</p>
            @endforelse
        </div>
        <div class="col-4">
            @include('posts._partials.activity');
        </div>
    </div>
@endsection
