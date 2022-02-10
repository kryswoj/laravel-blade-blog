<div class="card">
    <div class="card-body">
        <h5 class="card-title">Most active last month</h5>
        <p class="card-subtitle mt-2 text-muted">
            Users with most post written last month.
        </p>
    </div>
    <ul class="list-group list-group-flush">
        @foreach ($mostActiveLastMonth as $user)
            <li class="list-group-item">
                {{ $user->name }}
            </li>
        @endforeach
    </ul>
</div>
