<hr>
    <div>
        <div class="d-flex justify-content-between mb-2">
            <h1 class="w-75">
                <a
                    href="{{ route('posts.show', ['post' => $post->id]) }}"
                >
                    {{ $post->title }}
                </a>
            </h1>
            <div class="my-auto">
                <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-outline-secondary">Show post</a>
            </div>
        </div>
        <p class="w-75">{{ Str::limit($post->content, 150) }}</p>
    </div>
