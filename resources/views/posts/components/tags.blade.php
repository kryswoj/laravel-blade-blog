<div>
    @foreach ($tags as $tag)
        <a
            href="{{ route('post.tags.index', ['id' => $tag->id]) }}"
            class="badge p-2 text-decoration-none {{ Route::currentRouteName() === 'posts.show' ? 'bg-dark' : 'violet'}}"
        >
            {{ $tag->name }}
        </a>
    @endforeach
</div>
