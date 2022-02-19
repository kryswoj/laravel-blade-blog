<div class="d-flex flex-column p-2 pt-0" style="margin-top:25%;">
    @guest
    <h2 class="text-center mb-5">Login</h2>
    <form class="mx-5" action="{{ route('login') }}" method="POST">
        @csrf

        <label for="email" class="form-label">E-mail</label>
        <input
            type="text"
            id="email"
            name="email"
            value="{{ old('email') }}"
            class="{{ $errors->has('email') ? ' is-invalid' : 'mb-3' }}"
            required
        >
        @if($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <label for="password" class="form-label">Password</label>
        <input
            type="password"
            id="password"
            name="password"
            class="{{ $errors->has('password') ? ' is-invalid' : 'mb-3' }}"
            required
        >

        <div class="mx-auto w-50 mb-5 mt-3">
            <button class="btn btn-outline-primary w-100" type="submit">
                Login
            </button>
        </div>
    </form>







    @else
    <a href="{{ route('users.show', ['user' => Auth::user()->id]) }}" class="mx-auto">
        <div class="d-flex justify-content-center">
            <img
            src="{{
                Auth::user()->image ?
                Auth::user()->image->url() :
                "https://via.placeholder.com/128/000000/FFFFFF/?text="}}"
            class="img-thumbnail avatar rounded-circle"
            alt="Profile picrutre">
        </div>
        <div class="mt-3 text-center mb-5">
            <p class="fs-4 mb-1">
                {{ Auth::user()->name ?? 'Krystian Wojciechowski' }}
            </p>
            <p class="fw-lighter text-light text-uppercase">
                {{ Auth::user()->job ?? 'User'}}
            </p>
        </div>
    </a>
    @endguest
</div>
