<x-app-layout>
    <x-slot name='header'>
        Timeline
    </x-slot>
    <div class='bg-gray-100 w-64 p-4 flex flex-col flex-shrink-0 md:w-50'>
        <div class="sticky top-0 z-10">
            <div class="text-2xl p-4 mb-4 flex justify-center items-center rounded-full">
                Following
            </div>
            @foreach($categories as $category)
            <a href="{{route('categories.show',$category->id)}}">
                <div class="h-24 bg-white rounded-lg shadow-lg ease-in transition duration-200 transform hover:scale-105 mb-4">
                    <div class="h-12 w-full bg-gray-200 rounded-t-lg flex flex-col justify-between p-4 bg-cover bg-center" style="background-image: url('{{$category->category_image}}')"></div>
                    <div class="flex items-center mb-2 space-x-4 px-2 pt-3 pb-1">
                        <h1 class="text-gray-600">{{$category->name}}</h1>
                        <p class="text-gray-400 text-sm">{{'@'.$category->user->name}}</p>
                    </div>
                </div>
            </a>
        @endforeach
        </div>
    </div>
<div class='flex-1 p-4 bg-gray-200'>
    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($posts as $post)
        <div>
        
                <div class="bg-white rounded-lg shadow-lg ease-in transition duration-200 transform hover:scale-105">
                    <div class="flex items-center mb-2 px-2 pt-3 pb-1">
                        <a href='{{route('users.show',$post->user->name)}}' class="w-8 h-8">
                        <img src="{{$post->user->user_image}}" class="w-8 h-8 ml-1 mr-4 rounded-full overflow-full hover:opacity-80 ring ring-gray-400">
                        </a>
                        <a href="{{route('categories.show',$post->category->id)}}" class="text-gray-600 hover:underline ml-4">{{$post->category->name}}</p>
                        <a href='{{route('users.show',$post->user->name)}}' class="text-gray-400 hover:underline">-{{'@'.$post->user->name}}</a>
                    </div>
                    <div class='relative aspect-w-1 aspect-h-1 w-full h-full'>
                        <a href='{{route('posts.show',$post->id)}}'>
                            <img src="{{ $post->post_image }}" alt="画像が読み込めません。" class="w-full h-full object-cover"/>
                        </a>
                    </div>
                    <a href='{{route('posts.show',$post->id)}}'>
                    <div class="flex items-center mb-2 space-x-4 px-2 pt-3 pb-1">
                        <h1 class="text-gray-600 truncate w-full overflow-hidden whitespace-nowrap">{{$post->title}}</h1>
                    </div>
                    </a>
                </div>
            
        </div>
    @endforeach
    </div>
</div>

</x-app-layout>