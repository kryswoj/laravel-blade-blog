@extends('layouts.app')

@section('title', 'Create the post')

@section('content')

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('posts._partials.form')
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Create</button>
        </div>
    </form>

@endsection
