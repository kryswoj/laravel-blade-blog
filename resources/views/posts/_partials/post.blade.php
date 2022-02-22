
<div>
    <div
        class="d-flex flex-column mt-5 px-5 py-3 mb-3 shadow post-background"
        style="background:white; border-radius:15px; color:black; border:1px solid #b7b7b770;"
    >
        <div class="d-flex justify-content-between">
            <a
                href="{{ route('posts.show', ['post' => $post->id]) }}"
                style="color:black;"
            >
                <h2 class="fw-bold post-title mb-0">{{ $post->title }}</h2>
            </a>
            @auth
                @include('posts._partials.add_remove_favs')
            @endauth
        </div>
        <a
            href="{{ route('users.show', ['user' => $post->user->id]) }}"
            class="text-muted"
        >
            <p class="m-0 p-0">
                {{ $post->user->name }}
            </p>
        </a>
        <div class="mt-2 mb-3">
            <x-tags :tags="$post->tags"/>
        </div>
        <div>
            <p class="text-muted" style="word-break: break-all;">{{ Str::limit($post->content, 450) }}</p>
        </div>
    </div>
    <div class="mx-auto d-flex flex-column p-2 shadow" style="background:#DFDFDF; border-radius:15px; width:85%; margin-top:-2.5%; min-height:50px; border:1px solid #B7B7B7;">
        @if($post->mostRecentComment)
            <div class="text-center">
                <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                    <i class="fa-solid fa-ellipsis text-muted fa-2x"></i>
                </a>
            </div>
            <div class="text-muted mb-2">
                <a
                    href="{{ route('users.show', ['user' => $post->mostRecentComment->user->id]) }}"
                    class="ms-2"
                    style="color:black;"
                >
                    {{ $post->mostRecentComment->user->name }}
                </a> said:
            </div>
            <div class="d-flex" style="align-items:center;">
                <div>
                    <img
                        src="{{
                            $post->mostRecentComment->user->image ?
                            $post->mostRecentComment->user->image->url() :
                            "https://via.placeholder.com/64/000000/FFFFFF/?text=" . str_replace(' ', '+', $post->mostRecentComment->user->name) }}"
                        alt="Profile picture"
                        style="width:64px; height:64px;"
                        class="rounded-circle ms-2 img-thumbnail"
                    >
                </div>
                <div class="m-2" style="background:white; border-radius:15px; width:100%; border:1px solid #B7B7B7;">
                    <p class="text-muted m-0 p-2" style="padding-left:15px; word-break: break-all;">{{ $post->mostRecentComment->content }}</p>
                </div>
            </div>
        @else
            @include('comments.create', ['text' => 'Be first to comment this post!'])
        @endif
    </div>
</div>
