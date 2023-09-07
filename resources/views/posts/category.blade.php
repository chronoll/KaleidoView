<x-app-layout>
    @section('title',$category->name." by ".$category->user->nickname)
    <x-slot name='header'>
        <div class="flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 fill-current text-gray-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
        </svg>
        <a class="text-xl" href={{route('users.show',$category->user->name)}}>{{$category->user->name}}</a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
        </svg>
        <a class="text-xl" href={{route('categories.show',$category->id)}}>{{$category->name}}</a>
        </div>
    </x-slot>
    <x-category-info :category='$category' />
    
    
    
    <div class="flex-1 bg-repeat p-4" style="background-image:url('{{$category->category_image}}'); background-size: 128px auto;">
        @if(Auth::id()==$category->user_id)
    <a href='{{route('posts.create',$category->id)}}' class="bg-white hover:bg-gray-300 text-2xl p-4 mb-4  flex justify-center items-center rounded-full shadow-lg">
        +新規投稿
    </a>
    @endif
    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($posts as $post)
        <div class='relative aspect-w-1 aspect-h-1 w-full h-full'>
            <a href='{{route('posts.show',$post->id)}}'>
            <img src="{{ $post->post_image }}" alt="画像が読み込めません。" class="w-full h-full object-cover"/>
            </a>
        </div>
        @endforeach
    </div>
</div>
</x-app-layout>