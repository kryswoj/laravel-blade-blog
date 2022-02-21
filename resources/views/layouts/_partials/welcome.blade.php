<div class="ms-3" style="margin-top:5%;">
    <h1 class="fw-bold" style="text-shadow: 0 0.5rem 1rem rgb(0 0 0 / 25%);">
        Hi, {{ Auth::user() ? Auth::user()->name : 'Unknown'}}!
    </h1>
    @guest
        <p>
            For full experience
            <a href="{{ route('login') }}"><strong>login</strong></a>
            or
            <a href="{{ route('register') }}"><strong>register</strong></a>
            :)
        </p>
    @else
        @if(Route::currentRouteName() === 'post.tags.index')
            <p>Browsing <b>{{ $tag->name }}</b> tag</p>
        @else
            <p>Have a great day!</p>
        @endif
    @endguest
</div>
