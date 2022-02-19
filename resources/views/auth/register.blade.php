@extends('layouts.app')

@section('content')
    <form action="{{ route('register') }}" method="POST" class="w-50 m-auto mt-5">
        @csrf
        <div class="form-group mt-3">
            <label for="name" class="text-dark form-label">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                class="{{ $errors->has('name') ? ' is-invalid' : '' }}"
                required
            >
            @if($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
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
            <label for="password_confirmation" class="text-dark form-label">Password confirmation</label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                class="{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                required
            >
            @if($errors->has('password_confirmation'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>

        <div class="d-grid gap-2 mt-3">
            <button class="btn btn-primary" type="submit">Register</button>
        </div>
    </form>
@endsection
