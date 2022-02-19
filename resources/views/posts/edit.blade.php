@extends('layouts.app')

@section('title', 'Update the post')

@section('content')

    <form
        action="{{ route('posts.update', ['post' => $post->id]) }}"
        method="POST"
        enctype="multipart/form-data"
        class="w-50 m-auto mt-5"
    >
        @csrf
        @method('PUT')
        @include('posts._partials.form')
        <button class="btn-primary btn" type="submit">
            Edit
        </button>
    </form>

@endsection
