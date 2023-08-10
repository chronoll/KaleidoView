<x-app-layout>
    <x-slot name='header'>
        Category
    </x-slot>
    <x-category-info :category='$category' />
    <div class='bg-gray-200 p-4'>
        <img src="{{ $category->category_image }}" alt="画像が読み込めません。"/>
        <h1>{{$category->name}}</h1>
        <div class='new_post'>
            @if(Auth::id()==$category->user_id)
            <a href='{{route('posts.create',$category->id)}}'>+New Post</a>
            @endif
        </div>
    </div>
    <div class='posts'>
        @foreach ($posts as $post)
        <div class='post'>
            <a href='{{route('posts.show',$post->id)}}' style='text-decoration: none; color: inherit;'>
            <div class='image'>
                <img src="{{ $post->post_image }}" alt="画像が読み込めません。"/>
            </div>
            </a>
         </div>
        @endforeach
    </div>
</x-app-layout>