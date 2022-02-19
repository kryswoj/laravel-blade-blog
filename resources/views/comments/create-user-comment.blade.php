<div class="my-2">
    @if(Auth::user()->id === $user->id)
        <p class="text-muted">See what others talk about you!</p>
    @else
        <div class="mx-auto d-flex flex-column p-2 shadow mt-3" style="background:#DFDFDF; border-radius:15px; min-height:50px; border:1px solid #B7B7B7;">
            @include('comments.create', ['text' => 'Say something nice about this user!'])
        </div>
    @endif
</div>
<hr>
