<div id="comment-{{ $comment->id }}" style="margin-left: {{ $margin }}px;">
    <img src="{{ $comment->user->user_image }}" alt="User image">
    <strong>{{ $comment->user->name }}</strong>
    <p>{{ $comment->content }}</p>
    <small>{{ $comment->created_at->format('Y-m-d H:i') }}</small>
    
    <!-- 返信ボタンの追加 -->
    <button class="reply-button" data-comment-id="{{ $comment->id }}">返信</button>
    <form action='/comments/{{$comment->id}}' id='form_{{$comment->id}}'method='POST'>
        @csrf
        @method('DELETE')
        @if(Auth::id()==$comment->user_id)
        <button type='button' onclick='deleteComment({{$comment->id}})'>delete</button>
        @endif
    </form>
    @foreach($comment->children as $childComment)
        @include('comments', ['comment' => $childComment, 'margin' => $margin + 40])
    @endforeach
</div>
<script src="{{ asset('js/reply.js') }}"></script>  <!-- パスの変更 -->
