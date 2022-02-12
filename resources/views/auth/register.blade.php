@extends('layouts.app')

@section('content')
    <form action="{{ route('register') }}" method="POST" class="w-50 m-auto">
        @csrf
        <div class="form-group mt-3">
            <label for="name" class="form-label">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                required
            >
            @if($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
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
            <label for="password_confirmation" class="form-label">Password confirmation</label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
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
