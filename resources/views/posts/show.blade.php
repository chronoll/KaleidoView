<x-app-layout>
    <x-slot name='header'>
        Post
    </x-slot>
    <div class='post'>
        <div class='image'>
            <img src="{{ $post->post_image }}" alt="画像が読み込めません。"/>
        </div>
        <h2 class='title'>{{$post->title}}</h2>
        <div class='datetimes'>
            <p class='updated_at'>更新日時:{{$post->updated_at}}</p>
            <p class='created_at'>作成日時:{{$post->created_at}}</p>
        </div>
        <div class='body'>
            <p>{{$post->body}}</p>
        </div>
    </div>
    <div class='edit'>
        @if (Auth::id() == $post->user_id)
        <a href="/posts/{{ $post->id }}/edit">Edit</a>
        @endif
    </div>
    <div class='like'>
        <p>{{$post->likes->count()}}人がいいねしました</p>
        @if (Auth::user()->hasLiked($post))
        <!-- いいねを外すボタン -->
        <form method="POST" action="{{ route('unlike', $post) }}">
            @csrf
            @method('DELETE')
            <input type="image" src="https://res.cloudinary.com/dig0xnvus/image/upload/v1689676790/Unlike.jpg">
        </form>
        @else
        <!-- いいねするボタン -->
        <form method="POST" action="{{ route('like', $post) }}">
            @csrf
            <input type="image" src="https://res.cloudinary.com/dig0xnvus/image/upload/v1689676791/Like.jpg">
        </form>
        @endif
    </div>
    <div>
    <h3>Comments ({{ $comments->count() }})</h3>
    @foreach ($comments as $comment)
        @include('comments', ['comment' => $comment, 'margin' => 0])
    @endforeach
</div>
</x-app-layout>