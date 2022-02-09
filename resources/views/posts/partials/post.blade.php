{{-- @if($loop->even) --}}
{{-- @else --}}
{{-- <div style="color:lightblue">{{ $key }}</div> --}}
{{-- @endif --}}
<div class="mb-3">
    @if($post->trashed())
        <del>
    @endif
            <a
            href="{{ route('posts.show', ['post' => $post->id]) }}"
            class="text-decoration-none {{ $post->trashed() ? 'text-muted' : '' }}"
            >
                <h2>{{ $post->title }}</h2>
            </a>
    @if($post->trashed())
        </del>
    @endif
    <p class="text-muted">
        Added {{ $post->created_at->diffForHumans() }} <br>
        by {{ $post->user->name }}
    </p>

    @if($post->comments_count)
        <p>{{ $post->comments_count }} comments</p>
    @else
        <p>No comments yet.</p>
    @endif

    <div class="d-flex">
        @auth
            @can('update', $post)
                <a
                    href="{{ route('posts.edit', ['post' => $post->id]) }}"
                    class="btn me-2 {{ $post->trashed() ? 'btn-outline-secondary' : 'btn-primary' }}"
                >
                    Edit
                </a>
            @endcan
            @if(!$post->trashed())
                @can('delete', $post)
                    <form action="{{ route('posts.destroy', ['post'=> $post->id]) }}" method="POST" >
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-primary" type="submit">Delete</button>
                    </form>
                @endcan
            @endif
        @endauth
    </div>
</div>
