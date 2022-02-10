<div class="form-group">
    <textarea
        name="content"
        id="content"
        class="form-control mb-3"
    ></textarea>
</div>
@error('content')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror