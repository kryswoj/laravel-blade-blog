@forelse($comments as $comment)
<p>
    {{ $comment->content }}, <br>
    <x-tags :tags="$comment->tags"/>
    <span class="text-muted">
        added {{ $comment->created_at->diffForHumans() }},<br>
        by <a href="{{ route('users.show', ['user' => $comment->user->id]) }}">{{ $comment->user->name }}</a>
    </span>
</p>

@empty
<p>No comments yet.</p>
@endforelse
