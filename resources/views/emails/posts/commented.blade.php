<style type="text/css">
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<p>Hi {{ $comment->commentable->user->name }}</p>

<p>
    Someone has commented on your blog post
    <a href="{{ route('posts.show', ['post' => $comment->commentable->id]) }}">
        "{{ $comment->commentable->title }}"
    </a>
</p>

<hr/>

<p>
    <img src="{{ $message->embed(public_path() . $comment->user->image->url()) }}">
    <a href="{{ route('users.show', ['user' => $comment->user->id]) }}">
        {{ $comment->user->name }}
    </a>
</p>


<p>
    Said: <br>
    {{ $comment->content }}
</p>