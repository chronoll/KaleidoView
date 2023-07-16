<x-app-layout>
    <x-slot name='header'>
        Timeline
    </x-slot>
    <div class='categories'>
        <h2>Following</h2>
        @foreach($categories as $category)
        <div class='category'>
            <p class='category_name'>{{$category->name}}</p>
            <p class='user_name'>{{$category->user->name}}</p>
            <img src='{{$category->user->user_image}}'/>
        </div>
        @endforeach
    </div>
    <div class='posts'>
        @foreach ($posts as $post)
        <div class='post'>
            <p class='name'>{{'@'.$post->user->name}}-{{$post->category->name}}</p>
            <h2 class='title'>{{$post->title}}</h2>
            <div class='image'>
                <img src="{{ $post->post_image }}" alt="画像が読み込めません。"/>
            </div>
         </div>
        @endforeach
    </div>
</x-app-layout>