<!-- comments.blade.php -->

<div style="margin-left: {{ $margin }}px;">
    <img src="{{ $comment->user->user_image }}" alt="User image">
    <strong>{{ $comment->user->name }}</strong>
    <p>{{ $comment->content }}</p>
    <small>{{ $comment->created_at->format('Y-m-d H:i') }}</small>

    @foreach($comment->children as $childComment)
        @include('comments', ['comment' => $childComment, 'margin' => $margin + 40])
    @endforeach
</div>
