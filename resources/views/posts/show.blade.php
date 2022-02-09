@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p>Added {{ $post->created_at->diffForHumans() }}</p>

    @if(now()->diffInMinutes($post->created_at) < 5)
        <x-alert>
            Brand new post!
        </x-alert>
    @endif

    <p class="small text-muted">Currently read by {{ $counter }} people.</p>

    <h4>Comments</h4>

    @forelse($post->comments as $comment)
        <p>
            {{ $comment->content }}, <br>
            <span class="text-muted">
                added {{ $comment->created_at->diffForHumans() }}
            </span>
        </p>

    @empty
        <p>No comments yet.</p>
    @endforelse
@endsection
