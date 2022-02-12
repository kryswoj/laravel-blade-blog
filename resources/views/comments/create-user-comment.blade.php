<div class="my-2">
    @auth
        <p class="text-muted">Write a comment.</p>
        <form action="{{ route('users.comments.store', ['user' => $user->id]) }}" method="POST">
            @csrf

            @include('comments._partials.form')
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Create</button>
            </div>
        </form>
    @else
        <a href="{{ route('login') }}">Sign-in</a> to post comments.
    @endauth
</div>
<hr>
