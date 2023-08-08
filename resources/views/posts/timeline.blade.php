<x-app-layout>
    <x-slot name='header'>
        Timeline
    </x-slot>
    <div class='categories'>
        <h2>Following</h2>
        @foreach($categories as $category)
        <div class='category'>
            <div class='user'>
                <a href='{{route('users.show',$category->user->name)}}' style='text-decoration: none; color: inherit;'>
                <img src='{{$category->user->user_image}}'/>
                </a>
            </div>
            <a href='{{route('categories.show',$category->id)}}' style='text-decoration: none; color: inherit;'>
                <p class='category_name'>{{$category->name}}</p>
                <p class='user_name'>{{$category->user->name}}</p>
            </a>
        </div>
        @endforeach
    </div>
    <div class='posts'>
        @foreach ($posts as $post)
        <div class='post'>
            <div class='user'>
                <a href='{{route('users.show',$post->user->name)}}' style='text-decoration: none; color: inherit;'>
                <img src='{{$post->user->user_image}}'/>
                </a>
            </div>
            <div class='category'>
                <a href='{{route('categories.show',$post->category->id)}}' style='text-decoration: none; color: inherit;'>
                <p class='name'>{{'@'.$post->user->name}}-{{$post->category->name}}</p>
                </a>
            </div>
            <a href='{{route('posts.show',$post->id)}}' style='text-decoration: none; color: inherit;'>
            <h2 class='title'>{{$post->title}}</h2>
            <div class='image'>
                <img src="{{ $post->post_image }}" alt="画像が読み込めません。"/>
            </div>
            </a>
         </div>
        @endforeach
    </div>
</x-app-layout>