{{-- @if($loop->even) --}}
{{-- @else --}}
{{-- <div style="color:lightblue">{{ $key }}</div> --}}
{{-- @endif --}}


<div class="mb-3">
    <a
    href="{{ route('posts.show', ['post' => $post->id]) }}"
    class="text-decoration-none"
    >
        <h2>{{ $post->title }}</h2>
    </a>

    @if($post->comments_count)
        <p>{{ $post->comments_count }} comments</p>
    @else
        <p>No comments yet.</p>
    @endif

    <div class="d-flex">
        <a
            href="{{ route('posts.edit', ['post' => $post->id]) }}"
            class="btn btn-primary me-2"
        >
            Edit
        </a>
        <form action="{{ route('posts.destroy', ['post'=> $post->id]) }}" method="POST" >
            @csrf
            @method('DELETE')

            <button class="btn btn-primary" type="submit">Delete</button>
        </form>
    </div>
</div>
