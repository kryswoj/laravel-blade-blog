<a href="{{ route('posts.index') }}" class="col-md-3 ps-5 nav-brand my-auto fw-bolder fs-4 p-0">Laravel App</a>
<div class="col-md-9 d-flex justify-content-between ps-2" style="margin-right: 0 !important; margin-left:0 !important">
    <div class="d-flex">
        <a class="p-2" href="{{ route('posts.index') }}">Home</a>
        @if(Auth::user())
            <a class="p-2" href="{{ route('users.show', ['user' => Auth::user()->id]) }}">Profile</a>
        @endif
        <a class="p-2" href="{{ route('home.contact') }}">Contact</a>
    </div>
    <div class="d-flex me-5">
        @guest
            @if(Route::has('register'))
                <a class="p-2" href="{{ route('register') }}">Register</a>
            @endif
            <a class="p-2" href="{{ route('login') }}">Login</a>
        @else
            <a class="p-2" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
            >
                Logout
                <i class="fa-solid fa-door-open"></i>
            </a>
            <form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">
                @csrf
            </form>
        @endguest

    </div>
</div>
