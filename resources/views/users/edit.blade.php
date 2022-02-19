@extends('layouts.app')

@section('content')
    <div class="col-12 violet" style="border-radius: 0px 0px 50px 0px; min-height:250px; padding-top:2.5%;">
        <form
            method="POST"
            action="{{ route('users.update', ['user' => $user->id]) }}"
            enctype="multipart/form-data"
            class="form-horizontal pb-5 w-75 mx-auto"
        >
            @csrf
            @method('PUT')
        <div class="d-flex flex-column" style="margin-top:5%;">
            <div class="d-flex">
                <div class="col-md-3 d-flex flex-column mt-2">
                    <div class="d-flex justify-content-center mb-3">
                        <img
                            src="{{
                                $user->image ?
                                $user->image->url() :
                                "https://via.placeholder.com/128/000000/FFFFFF/?text=" . str_replace(' ', '+', $user->name)
                            }}"
                            class="img-thumbnail avatar rounded-circle "
                        />
                    </div>
                    <div class="ms-3 p-2"style="background: white; border-radius:15px; border:1px solid #B7B7B7;">
                        <h6 class="p-2" style="color: #848484;">
                            Upload a photo (128px)
                        </h6>
                        <input
                            type="file"
                            name="avatar"
                            class="form-control"
                            style="border-radius: 15px; color:#848484;"
                        />
                    </div>
                </div>

                <div class="col-md-9 d-flex flex-column ms-3">
                    <label for="name" class="form-label">Name: </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ $user->name }}"
                        class="mb-3"
                    />
                    <label for="job" class="form-label">Job: </label>
                    <input
                        type="text"
                        name="job"
                        id="job"
                        value="{{ $user->job ?? '' }}"
                        class="mb-3"
                    />
                    <label for="bio" class="form-label">Bio: </label>
                    <textarea
                        name="bio"
                        id="bio"
                        class="mb-3"
                    >{{ old('bio', optional($user ?? null)->bio) }}</textarea>

                    @if ($errors->any())
                        <div class="text-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button class="btn btn-sm btn-outline-primary mt-4 ms-auto w-25" type="submit">
                        Update
                    </button>
                </div>


            </div>
        </div>

    </form>
    </div>

    <div class="col-md-12 text-center">
        <h1 style="color:#84848469;">Here will be option to pin some posts 'n' stuff...</h1>
    </div>
@endsection
