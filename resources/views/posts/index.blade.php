@extends('layouts.app')

@section('title', 'Blog posts')

@section('content')

<div class="col-md-3">
    <div class="d-flex">
        <div class="col-md-3 violet position-fixed start-0" style="{{ Auth::user() ? '' : 'border-radius: 0px 0px 50px 0px;'}}">
            @include('layouts._partials.sidebar')
        </div>

        <div class="col-md-3 violet position-fixed start-0" style="border-radius: 0px 0px 50px 0px; top:40%;">
            @include('layouts._partials.sidebar-2')
        </div>
    </div>
</div>
<div class="col-md-9 ps-0">

    <div class="violet w-100" style="border-radius: 0px 0px 50px 0px; min-height:250px; padding-top:2.5%;">
        @include('layouts._partials.welcome')
    </div>

    <div class="w-75 mx-auto" style="margin-top: -7.5%;">
            @forelse ($posts as $post)
                @include('posts._partials.post')
            @empty
            <div>No post found!</div>
            @endforelse
        </div>
    </div>
</div>

@endsection

{{--  <div class="col-4">
    @include('posts._partials.activity')
</div>  --}}
