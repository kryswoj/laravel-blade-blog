
    <label for="title" class="form-label text-dark">Title</label>
    <input
        type="text"
        name='title'
        id="title"
        value="{{ old('title', optional($post ?? null)->title) }}"
        class="mb-3"
    />
        <p class="m-0 mb-1 p-0 text-dark">Tags</p>
        @foreach (App\Models\Tag::all() as $tag)
            <div class="form-check">
                @if(isset($post))
                    <input
                        type="checkbox" value="{{ $tag->id }}"
                        name="tags[]"
                        id="tags[{{ $tag->id }}]"
                        class="form-check-input"
                        {{ $post->tags->contains($tag->id) ? 'checked' : '' }}
                    >
                @else
                    <input
                        type="checkbox" value="{{ $tag->id }}"
                        name="tags[]"
                        id="tags[{{ $tag->id }}]"
                        class="form-check-input"
                    >
                @endif
                <label class="form-check-label text-dark" for="tags[{{ $tag->id }}]">
                    {{ $tag->name }}
                </label>
            </div>
        @endforeach

    <label for="content" class="form-label text-dark mt-2">Content</label>
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

     @if($errors->any())
        <div class="mb-3">
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

