<p>
    @foreach ($tags as $tag)
        <a
            href="{{ route('post.tags.index', ['id' => $tag->id]) }}"
            class="badge p-2 bg-success text-decoration-none"
        >
            {{ $tag->name }}
        </a>
    @endforeach
</p>