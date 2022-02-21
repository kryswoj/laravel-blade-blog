
@if(!Auth::user()->isPostFavourite($post))
    <form
    id="add-to-favs-form-{{$post->id}}"
    action="{{ route('posts.favourite.store', ['post' => $post]) }}"
    method="POST"
    >
    @csrf
    <i
        class="fa-regular fa-star fa-2x"
        style="cursor: pointer;"
        onclick="event.preventDefault();document.getElementById(`add-to-favs-form-{{$post->id}}`).submit();"
    ></i>
    </form>
@else
    <form
        id="add-to-favs-form-{{$post->id}}"
        action="{{ route('posts.favourite.destroy', ['post' => $post]) }}"
        method="POST"
        >
        @csrf
        @method('DELETE')
        <i
            class="fa-solid fa-star fa-2x"
            style="cursor: pointer;"
            onclick="event.preventDefault();document.getElementById(`add-to-favs-form-{{$post->id}}`).submit();"
        ></i>
    </form>
@endif
