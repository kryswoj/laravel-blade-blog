@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-4">
            <img
                src="{{ $user->image ? $user->image->url() : '' }}"
                class="img-thumbnail avatar"
            />
        </div>
        <div class="col-8">
            <h3>{{ $user->name }}</h3>

            <p class="text-muted">Currently viewed by {{ $counter }} users.</p>
        @include('comments.create-user-comment');
        @include('comments.showall', ['comments' => $user->commentsOn])
        </div>
    </div>
@endsection
