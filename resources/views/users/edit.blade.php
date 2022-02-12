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
                    src="{{ $user->image ? $user->image->url() : '' }}"
                    class="img-thumbnail avatar"
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

                @error('avatar')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <input
                        type="submit"
                        class="btn btn-primary"
                        value="Save Changes"
                    />
                </div>
            </div>
        </div>

    </form>
@endsection
