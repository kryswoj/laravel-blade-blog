@forelse($comments as $comment)
    <div class="mx-auto d-flex flex-column p-2 shadow mt-3" style="background:#DFDFDF; border-radius:15px; min-height:50px; border:1px solid #B7B7B7;">
        <div class="text-muted mb-2">
            <a
                href="{{ route('users.show', ['user' => $comment->user->id]) }}"
                class="ms-2"
                style="color:black;"
            >
                {{ $comment->user->name }}
            </a> said:
        </div>
        <div class="d-flex" style="align-items:center;">
            <div>
                <img
                    src="{{ $comment->user->image ?
                        $comment->user->image->url() :
                        "https://via.placeholder.com/64/000000/FFFFFF/?text=" . str_replace(' ', '+', $comment->user->name) }}"
                    alt=""
                    style="width:64px; height:64px;"
                    class="rounded-circle ms-2 img-thumbnail"
                >
            </div>
            <div class="m-2" style="background:white; border-radius:15px; width:100%; border:1px solid #B7B7B7;">
                <p class="text-muted m-0 p-2" style="padding-left:15px;">{{ $comment->content }}</p>
            </div>
        </div>
    </div>


@empty
<p>No comments on this user.</p>


{{--  <p>
    {{ $comment->content }}, <br>
    <x-tags :tags="$comment->tags"/>
    <span class="text-muted">
        added {{ $comment->created_at->diffForHumans() }},<br>
        by <a href="{{ route('users.show', ['user' => $comment->user->id]) }}">{{ $comment->user->name }}</a>
    </span>
</p>

@empty
<p>No comments yet.</p>  --}}
@endforelse

