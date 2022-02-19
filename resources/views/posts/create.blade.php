@extends('layouts.app')

@section('title', 'Create the post')

@section('content')

    <form
        action="{{ route('posts.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="w-50 m-auto mt-5">
        @csrf

        @include('posts._partials.form')
        <button class="btn btn-primary" type="submit">Create</button>
    </form>

@endsection
