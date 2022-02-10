<div class="card">
    <div class="card-body">
        <h5 class="card-title">Most commented</h5>
        <p class="card-subtitle mt-2 text-muted">
            What people are courrently talking about.
        </p>
    </div>
    <ul class="list-group list-group-flush">
        @foreach ($mostCommented as $post)
            <li class="list-group-item">
                <a
                    href="{{ route('posts.show', ['post' => $post->id]) }}"
                    class="text-decoration-none"
                >
                    {{ $post->title }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
