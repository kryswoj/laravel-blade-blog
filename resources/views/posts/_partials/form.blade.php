
    <label for="title" class="form-label text-dark">Title</label>
    <input
        type="text"
        name='title'
        id="title"
        value="{{ old('title', optional($post ?? null)->title) }}"
        class="mb-3"
    />

    <label for="tags" class="form-label text-dark">Tags</label>
    <select
        name="tags"
        id="tags"
        class="form-select"
        multiple
        aria-label="multiple select example"
    >
        @foreach (App\Models\Tag::all() as $tag)
            <option
                value="{{ $tag->id }}">{{ $tag->name }}
            </option>
        @endforeach
    </select>

    <label for="content" class="form-label text-dark">Content</label>
    <textarea
        name="content"
        id="content"
        class="mb-3"
    >{{ old('content', optional($post ?? null)->content) }}</textarea>

    <label for="thumbnail" class="form-label text-dark">Thumbnail</label>
    <input
        type="file"
        name='thumbnail'
        id="thumbnail"
        class="form-control mb-3"
    />



{{--  @if($errors->any())
    <div class="mb-3">
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif  --}}
