<div class="form-group">
    <label for="title" class="form-label">Title</label>
    <input
        type="text"
        name='title'
        id="title"
        value="{{ old('title', optional($post ?? null)->title) }}"
        class="form-control mb-3"
    />
</div>
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label for="content" class="form-label">Content</label>
    <textarea
        name="content"
        id="content"
        class="form-control mb-3"
    >{{ old('content', optional($post ?? null)->content) }}</textarea>
</div>
@error('content')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
    <label for="thumbnail" class="form-label">Thumbnail</label>
    <input
        type="file"
        name='thumbnail'
        id="thumbnail"
        class="form-control mb-3"
    />
</div>
@error('thumbnail')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

{{--  @if($errors->any())
    <div class="mb-3">
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif  --}}
