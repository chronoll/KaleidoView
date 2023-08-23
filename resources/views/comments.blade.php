@if($comment->trashed())
    <div class="w-2/3 h-24 bg-gray-300 shadow-lg rounded my-8 p-4 flex items-stretch" style="margin-left: {{ $margin ?? 0 }}px;">
        <div class="flex w-1/2 h-full items-center">
            <p>このコメントは削除されました。</p>
        </div>
        <div class="flex w-1/2 h-full items-end flex-row-reverse">
            <small>{{ $comment->created_at->format('Y-m-d H:i') }}</small>
        </div>
    </div>
@else
<div class="w-2/3" style="margin-left: {{ $margin ?? 0 }}px;">
<div id="comment-{{ $comment->id }}" class="w-full bg-white shadow-lg rounded my-4 p-4" >
    <div class='flex'>
        <div class="mr-4">
            <a href='{{route('users.show',$comment->user->name)}}'>
            <img src="{{ $comment->user->user_image }}" class="w-12 h-12 rounded-full overflow-full hover:opacity-80 ring-4 ring-gray-400" alt="User image">
            <div class="text-sm text-gray-800 text-center mt-2 hover:opacity-80">{{ $comment->user->nickname }}</div>
            </a>
        </div>
        <div class="flex-1 flex items-center mt-2">
            <p class="">{{ $comment->content }}</p>
        </div>
    </div>
    <div class="flex flex-row-reverse">
        <small>{{ $comment->created_at->format('Y-m-d H:i') }}</small>
    </div>
</div>
<div class="flex flex-row-reverse"><!-- 返信ボタンの追加 -->
    <button class="reply-button bg-gray-500 text-white p-1.5 rounded-lg hover:bg-gray-600" data-comment-id="{{ $comment->id }}">返信</button>
    <form action='/comments/{{$comment->id}}' id='form_{{$comment->id}}'method='POST'>
        @csrf
        @method('DELETE')
        @if(Auth::id()==$comment->user_id)
        <button type='button' class="bg-red-400 text-white p-1.5 rounded-lg hover:bg-red-500 mr-2" onclick='deleteComment({{$comment->id}})'>delete</button>
        @endif
    </form>
</div>
</div>
@endif
@foreach($comment->children as $childComment)
    @include('comments', ['comment' => $childComment, 'margin' => ($margin ?? 0) + 40])
@endforeach

<script src="{{ asset('js/reply.js') }}"></script>
