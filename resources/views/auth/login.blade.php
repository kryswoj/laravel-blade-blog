@extends('layouts.app')

@section('content')
    <form action="{{ route('login') }}" method="POST">

        @csrf
        <div class="form-group mt-3">
            <label for="email" class="form-label">E-mail</label>
            <input
                type="text"
                id="email"
                name="email"
                value="{{ old('email') }}"
                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                required
            >
            @if($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group mt-3">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                required
            >
            @if($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group mt-3">
            <div class="form-check">
                <label for="remember" class="form-check-label">Remember me!</label>
                <input
                    type="checkbox"
                    id="remember"
                    name="remember"
                    value="{{ old('remember') ? 'checked' : '' }}"
                    class="form-check-input"
                >
            </div>
        </div>

        <div class="d-grid gap-2 mt-3">
            <button class="btn btn-primary" type="submit">Login</button>
        </div>
    </form>
@endsection
