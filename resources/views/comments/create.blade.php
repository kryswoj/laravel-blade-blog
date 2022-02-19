<div class="my-2">
    @auth
        <p class="text-muted mb-2 ms-2">{{ $text }}</p>
        <div class="d-flex">
            <img
                src="{{
                    Auth::user()->image ?
                    Auth::user()->image->url() :
                    "https://via.placeholder.com/64/000000/FFFFFF/?text=" . str_replace(' ', '+', Auth::user()->name)
                }}"
                alt="Your profile picture"
                style="width:64px; height:64px;"
                class="rounded-circle ms-2 img-thumbnail"
            >
            <form
                action="{{ route('posts.comments.store', ['post' => $post->id]) }}"
                method="POST"
                class="d-flex m-2 w-100"
                style="align-items: center;"
            >
                @csrf

                @include('comments._partials.form')

                <button
                    class="btn {{ Route::currentRouteName() === 'posts.show' ? 'bg-dark text-light' : 'btn-primary'}}"
                    type="submit"
                    class="ms-2"
                >
                    Add
                </button>
            </form>
        </div>
    @else
        <a href="{{ route('login') }}">Sign-in</a> to post comments.
    @endauth
</div>

