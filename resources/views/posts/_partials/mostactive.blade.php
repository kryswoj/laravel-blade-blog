<div class="card">
    <div class="card-body">
        <h5 class="card-title">Most active</h5>
        <p class="card-subtitle mt-2 text-muted">
            Users with most post written.
        </p>
    </div>
    <ul class="list-group list-group-flush">
        @foreach ($mostActive as $user)
            <li class="list-group-item">
                {{ $user->name }}
            </li>
        @endforeach
    </ul>
</div>
