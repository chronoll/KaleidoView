<x-app-layout>
    <x-slot name='header'>
        Category
    </x-slot>
    <x-category-info :category='$category' />
    <div class='category'>
        <img src="{{ $category->category_image }}" alt="画像が読み込めません。"/>
        <h1>{{$category->name}}</h1>
        <div class='new_post'>
            @if(Auth::id()==$category->user_id)
            <a href='create'>+New Post</a>
            @endif
        </div>
    </div>
    <div class='posts'>
        @foreach ($posts as $post)
        <div class='post'>
            <div class='image'>
                <img src="{{ $post->post_image }}" alt="画像が読み込めません。"/>
            </div>
         </div>
        @endforeach
    </div>
</x-app-layout>