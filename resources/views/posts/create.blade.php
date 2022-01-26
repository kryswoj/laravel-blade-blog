@extends('layouts.app')

@section('title', 'Create the post')

@section('content')

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        @include('posts.partials.form')
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Create</button>
        </div>
    </form>

@endsection
