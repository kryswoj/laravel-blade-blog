@extends('layouts.app')

@section('title', 'Update the post')

@section('content')

    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data" class="w-50 m-auto">
        @csrf
        @method('PUT')
        @include('posts._partials.form')
        <div><input type="submit" value="Update"></div>
    </form>

@endsection
