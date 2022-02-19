@extends('layouts.app')

@section('content')
    <form
        method="POST"
        action="{{ route('users.update', ['user' => $user->id]) }}"
        enctype="multipart/form-data"
        class="form-horizontal"
    >
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-4">
                <img
                    src="{{ $user->image ? $user->image->url() : "https://via.placeholder.com/128/000000/FFFFFF/?text=" . str_replace(' ', '+', $user->name) }}"
                    class="img-thumbnail avatar rounded-circle"
                />

                <div class="card mt-4">
                    <div class="card-body">
                        <h6>Upload a different photo</h6>
                        <input
                            type="file"
                            name="avatar"
                            class="form-control"
                        />
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ $user->name }}"
                        class="form-control"
                    />
                </div>
                <div class="form-group mt-4">
                    <label for="bio" class="form-label">Bio: </label>
                    <textarea
                        name="bio"
                        id="bio"
                        class="form-control mb-3"
                        rows="5"
                    >{{ old('bio', optional($user ?? null)->bio) }}</textarea>
                </div>




            </div>
        </div>
        <div class="row">
            <div class="form-group col-4">
                <button class="alert btn btn-primary w-100">
                    Update
                </button>
            </div>
            <div class="col-8">
                @error('bio')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror

                @error('avatar')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

    </form>
@endsection
