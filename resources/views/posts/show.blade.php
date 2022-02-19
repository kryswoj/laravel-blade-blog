@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <div class="row">
        <div class="col-8">
            <div style="background-image: url('{{ $post->image ? $post->image->url() : "https://source.unsplash.com/random/1000×1000"}}'); min-height: 300px; color: white; text-align: center; background-attachment: fixed;">
                <h1 style="padding-top: 150px; text-shadow: 1px 2px #000">
                    {{ $post->title }}
                </h1>
            </div>
            <p class="mt-2">{{ $post->content }}</p>
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

            <h4>Comments</h4>

            @include('comments.create')
            @include('comments.showall', ['comments' => $post->comments])
        </div>
        <div class="col-4">
            @include('posts._partials.activity');
        </div>
    </div>
@endsection
