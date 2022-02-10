@extends('layouts.app')

@section('title', 'Blog posts')

@section('content')

{{-- @each('posts._partials.post', $posts, 'post', ) --}}
<div class="row">
    <div class="col-8">
        @forelse ($posts as $key => $post)
        {{-- @break($key = 2) --}}
        {{-- @continue($key = 1) --}}
            @include('posts._partials.post')
        @empty
        <div>No post found!</div>
        @endforelse
    </div>
    <div class="col-4">
        @include('posts._partials.activity')
    </div>
</div>
@endsection
