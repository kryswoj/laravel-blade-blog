@guest
@else
    <div class="d-flex justify-content-evenly fa-2x my-5">
        <a href="{{ route('users.show', ['user' => Auth::user()->id]) }}">
            <i class="fa-solid fa-user"></i>
        </a>
        <a href="{{ route('posts.create') }}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="{{ route('posts.favourite.index') }}">
            <i class="fa-solid fa-star"></i>
        </a>
    </div>
    <div class="text-center mb-5">
        <p>Your posts: <b>{{ Auth::user()->blogPosts->count() }}</b></p>
        <p>Comments: <b>{{ Auth::user()->comments->count() }}</b></p>
    </div>
@endguest
