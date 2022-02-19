@extends('layouts.app')

@section('content')
    <form action="{{ route('login') }}" method="POST" class="w-50 m-auto mt-5">

        @csrf
        <div class="form-group mt-3">
            <label for="email" class="text-dark form-label">E-mail</label>
            <input
                type="text"
                id="email"
                name="email"
                value="{{ old('email') }}"
                class="{{ $errors->has('email') ? ' is-invalid' : '' }}"
                required
            >
            @if($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group mt-3">
            <label for="password" class="text-dark form-label">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                class="{{ $errors->has('password') ? ' is-invalid' : '' }}"
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
                <label for="remember" class="text-dark form-check-label ms-2">Remember me!</label>
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
