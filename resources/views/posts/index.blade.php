@extends('layouts.app')

@section('title', 'Blog posts')

@section('content')

{{-- @each('posts.partials.post', $posts, 'post', ) --}}
<div class="row">
    <div class="col-8">
        @forelse ($posts as $key => $post)
        {{-- @break($key = 2) --}}
        {{-- @continue($key = 1) --}}
            @include('posts.partials.post')
        @empty
        <div>No post found!</div>
        @endforelse
    </div>
    <div class="col-4">
        <div class="container">
            <div class="row mb-4">
                @include('posts.partials.mostcommented')
            </div>
            <div class="row mb-4">
                @include('posts.partials.mostactive')
            </div>
            <div class="row">
                @include('posts.partials.mostactive_lastmonth')
            </div>
        </div>
    </div>
</div>
@endsection
