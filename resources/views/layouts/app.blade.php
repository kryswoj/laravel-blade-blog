<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel App - @yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <style>
        .form-control{
            background: #fff;
        }
    </style>
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-middle p-3 px-md-4 bg-white border-bttom shadow-sm mb-3">
        <h5 class="my-0 me-md-auto fw-normal mx-auto mx-md-0">Laravel App</h5>
        <nav class="my-2 my-md-0 me-md-3 mx-auto">
            <a class="p-2 text-dark text-decoration-none" href="{{ route('home.index') }}">Home</a>
            <a class="p-2 text-dark text-decoration-none" href="{{ route('home.contact') }}">Contact</a>
            <a class="p-2 text-dark text-decoration-none" href="{{ route('posts.index') }}">Blog</a>
            <a class="p-2 text-dark text-decoration-none" href="{{ route('posts.create') }}">Add</a>

            @guest
                @if(Route::has('register'))
                    <a class="p-2 text-dark text-decoration-none" href="{{ route('register') }}">Register</a>
                @endif
                <a class="p-2 text-dark text-decoration-none" href="{{ route('login') }}">Login</a>
            @else
                <form action="POST" method="{{ route('logout') }}" class="d-flex">
                    <button class="btn btn-outline-secondary" type="submit">Logout</button>
                </form>
            @endguest
        </nav>
    </div>
    <div class="container" style="max-width: 890px;">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @yield('content')
    </div>
</body>
</html>
