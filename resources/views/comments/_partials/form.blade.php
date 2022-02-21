<textarea
    type="text"
    id="content"
    name="content"
    class="me-2"
    rows=1
    style="border-radius: 15px; border:1px solid #B7B7B7; width:100%; padding:5px; padding-left:15px; color: #848484;"
></textarea>

@error('content')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
