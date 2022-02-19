<div class="d-flex x-auto flex-column" style="margin-top:5%;">
    <div class="d-flex">
        <div class="col-md-3 d-flex justify-content-end">
            <img
                src="{{
                    $user->image ?
                    $user->image->url() :
                    "https://via.placeholder.com/128/000000/FFFFFF/?text=" . str_replace(' ', '+', $user->name)
                }}"
                class="img-thumbnail avatar rounded-circle "
            />
        </div>

        <div class="col-md-9 d-flex flex-column ms-3">
            <p class="m-0 text-light fw-lighter text-uppercase">
                {{ $user->job ?? ''}}
            </p>
            <div class="d-flex" style="align-items: center;">
                <h1 class="fw-bold" style="text-shadow: 0 0.5rem 1rem rgb(0 0 0 / 25%);">
                    {{ $user->name }}
                </h1>
                @auth
                    @can('update', $user)
                        <button class="btn btn-outline-primary btn-sm ms-3 mb-1">
                            <a
                                href={{ route('users.edit', ['user' => $user->id]) }}
                                class="p-3"
                            >
                                Edit
                            </a>
                        </button>
                    @endcan
                @endauth
            </div>

            <p class="w-75 p-2">
                {{ $user->bio ?? 'No bio :[' }}
            </p>
        </div>
    </div>

    <div class="d-flex mt-5 mb-2 ">
        <div class="ps-5 col-md-7">
            <h2 class="fw-bold">User posts:</h2>
        </div>
        <div class="col-md-5">
            <h2 class="fw-bold">Comments:</h2>
        </div>
    </div>
</div>
