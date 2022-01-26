@extends('layouts.app')

@section('title', 'Blog posts')

@section('content')

{{-- @each('posts.partials.post', $posts, 'post', ) --}}

@forelse ($posts as $key => $post)
{{-- @break($key = 2) --}}
{{-- @continue($key = 1) --}}
    @include('posts.partials.post')
@empty
<div>No post found!</div>
@endforelse

@endsection
