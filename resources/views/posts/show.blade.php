<x-app-layout>
    <x-slot name='header'>
        Post
    </x-slot>
    <x-category-info :category='$category' />
    <div class='flex-1 bg-gray-200 p-4'>
        <div class='bg-white w-full shadow-lg p-4 flex flex-col items-center'>
            <div class='flex justify-between items-center w-full'>
                <div class='text-3xl'>{{$post->title}}</div>
                <div class="flex items-center text-gray-700 mb-1 mr-2">
                    @if (Auth::user()->hasLiked($post))
                    <!-- いいねを外すボタン -->
                    <form method="POST" action="{{ route('unlike', $post) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; padding: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 fill-current mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </button>
                    </form>
                    @else
                    <!-- いいねするボタン -->
                    <form method="POST" action="{{ route('like', $post) }}">
                        @csrf
                        <button type="submit" style="background: none; border: none; padding: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </button>
                    </form>
                    @endif
                    <div class="text-4xl">{{$post->likes->count()}}</div>
                </div>
            </div>
            <div class='x-auto m-4'>
                <img src="{{ $post->post_image }}" alt="画像が読み込めません。"/>
            </div>
        <div class="flex flex-row-reverse w-full items-center">
            <div class='flex'>
                @if($post->updated_at!=$post->created_at)
                <p class="mr-2 uppercase text-sm bg-gray-100 p-0.5 border-gray-500 border rounded text-gray-700 mb-1">更新日時:{{$post->updated_at}}</p>
                @endif
                <p class="uppercase text-sm bg-gray-100 p-0.5 border-gray-500 border rounded text-gray-700 mb-1">作成日時:{{$post->created_at}}</p>
            </div>
        </div>
        <div class='mt-4 text-left w-full'>
            <p>{{$post->body}}</p>
        </div>
        </div>
    <div class='flex flex-row-reverse'>
        @if (Auth::id() == $post->user_id)
        <a href="/posts/{{ $post->id }}/edit" class ="bg-blue-500 text-white mt-2 px-4 py-2 rounded hover:bg-blue-600">Edit</a>
        @endif
    </div>
    
    <div class='comments'>
    <div class="text-2xl text-gray-800">Comments ({{ $post->commentCount }})</div>
    @foreach ($comments as $comment)
        @include('comments', ['comment' => $comment, 'margin' => 0])
    @endforeach
    </div>
    <div id='originalFormLocation'>
        <form class='post_comment' method='POST' action='{{route('comment',$post)}}'>
            @csrf
            <div class="w-2/3 h-40 relative mt-8">
                <div class="flex">
                <img src="{{ Auth::user()->user_image }}" class="w-12 h-12 rounded-full overflow-full hover:opacity-80 ring-4 ring-gray-400" alt="User image">
                <textarea name='content' placeholder='コメントを入力' class="w-full h-20 border-0 outline-none mx-2 mt-2 placeholder-gray-500 placeholder-opacity-50"></textarea>
                <input type="hidden" name="parent_comment_id" id="parentCommentIdField" value="">  
                <p class='content_error' style='color:red'>{{$errors->first('content')}}</p>
                </div>
                <div class="absolute top-24 right-1 flex flex-row-reverse mt-2">
                    <button type='submit' class="ml-2 bg-green-500 text-white p-1.5 rounded-lg hover:bg-green-600">送信</button>
                    <button id='cancelReply' style='display: none;' class="bg-gray-500 text-white p-1.5 rounded-lg hover:bg-gray-600">返信をやめる</button>
                </div>
            </div>
        </form>
    </div>
    </div>
</x-app-layout>
<script>
function deleteComment(id){
    'use strict'
    if(confirm('コメントは復元できません\n本当に削除しますか?')){
        document.getElementById(`form_${id}`).submit();
        
    }
}
</script>