<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel App - @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <style>
        .form-control{
            background: #fff;
        }
    </style>
</head>
<body>
    <div
        class="d-flex top-0 end-0 w-100 position-fixed {{ Route::currentRouteName() === 'posts.show' ? 'bg-dark' : 'violet'}}"
        style="z-index: 5; margin-right: 0 !important; margin-left:0 !important;"
    >
        @include('layouts._partials.navigation')
    </div>
    <div class="row mb-5">
        @yield('content')
    </div>






























    {{--  <div class="d-flex flex-column flex-md-row align-middle p-3 px-md-4 bg-white border-bttom shadow-sm mb-3">
        <h5 class="my-0 me-md-auto fw-normal mx-auto mx-md-0">
            <a href="{{ route('posts.index') }}">Laravel App</a>
        </h5>
        <nav class="my-2 my-md-0 me-md-3 mx-auto">
            <a class="p-2" href="{{ route('home.contact') }}">Contact</a>
            <a class="p-2" href="{{ route('posts.index') }}">Blog</a>
            <a class="p-2" href="{{ route('posts.create') }}">Add</a>

            @guest
                @if(Route::has('register'))
                    <a class="p-2" href="{{ route('register') }}">Register</a>
                @endif
                <a class="p-2" href="{{ route('login') }}">Login</a>
            @else
                <a class="p-2" href="{{ route('users.show', ['user' => Auth::user()->id]) }}">Profile</a>
                <a class="p-2" href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                >
                    Logout ({{ Auth::user()->name }})
                </a>
                <form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
        </nav>
    </div>
    <div class="container">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @yield('content')
    </div>  --}}
</body>
</html>
