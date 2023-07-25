<x-app-layout>
    <x-slot name='header'>
        Category
    </x-slot>
    <div class='category'>
        <img src="{{ $category->category_image }}" alt="画像が読み込めません。"/>
        <h1>{{$category->name}}</h1>
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