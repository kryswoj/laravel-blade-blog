{{-- @if($loop->even) --}}
{{-- @else --}}
{{-- <div style="color:lightblue">{{ $key }}</div> --}}
{{-- @endif --}}

<div>
    <div class="d-flex flex-column mt-5 px-5 py-3 mb-3 shadow post-background" style="background:white; border-radius:15px; color:black; border:1px solid #b7b7b770;">
        <a href="{{ route('posts.show', ['post' => $post->id]) }}" style="color:black;">
                <h2 class="fw-bold post-title">{{ $post->title }}</h2>
        </a>
        <div class="mt-2 mb-3">
            <x-tags :tags="$post->tags"/>
        </div>
        <div>
            <p class="text-muted" style="word-break: break-all;">{{ Str::limit($post->content, 450) }}</p>
        </div>
    </div>
    <div class="mx-auto d-flex flex-column p-2 shadow" style="background:#DFDFDF; border-radius:15px; width:85%; margin-top:-5%; min-height:50px; border:1px solid #B7B7B7;">
        @if(!($post->comments)->isEmpty())
            <div class="text-center">
                <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                    <i class="fa-solid fa-ellipsis text-muted fa-2x"></i>
                </a>
            </div>
            <div class="text-muted mb-2">
                <a
                    href="{{ route('users.show', ['user' => $post->comments->first()->user->id]) }}"
                    class="ms-2"
                    style="color:black;"
                >
                    {{ $post->comments->first()->user->name }}
                </a> said:
            </div>
            <div class="d-flex" style="align-items:center;">
                <div>
                    <img
                        src="{{ $post->comments->first()->user->image ?
                            $post->comments->first()->user->image->url() :
                            "https://via.placeholder.com/64/000000/FFFFFF/?text=" . str_replace(' ', '+', $post->comments->first()->user->name) }}"
                        alt=""
                        style="width:64px; height:64px;"
                        class="rounded-circle ms-2 img-thumbnail"
                    >
                </div>
                <div class="m-2" style="background:white; border-radius:15px; width:100%; border:1px solid #B7B7B7;">
                    <p class="text-muted m-0 p-2" style="padding-left:15px;">{{ $post->comments->first()->content }}</p>
                </div>
            </div>
        @else
            @include('comments.create', ['text' => 'Be first to comment this post!'])
        @endif
    </div>
</div>






{{--  <div class="mb-3">
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
        by <a href="{{ route('users.show', ['user' => $post->user->id]) }}">{{ $post->user->name }}</a>
    </p>

    <x-tags :tags="$post->tags"/>

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
                    <form action="{{ route('posts.destroy', ['post'=> $post->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-primary" type="submit">Delete</button>
                    </form>
                @endcan
            @endif
        @endauth
    </div>
</div>  --}}
