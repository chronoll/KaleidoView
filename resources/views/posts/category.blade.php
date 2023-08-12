<x-app-layout>
    <x-slot name='header'>
        Category
    </x-slot>
    <x-category-info :category='$category' />
    
    
    
    <div class="flex-1 bg-gray-200 p-4">
        @if(Auth::id()==$category->user_id)
    <a href='{{route('posts.create',$category->id)}}' class="bg-white hover:bg-gray-300 text-2xl p-4 mb-4 border-4 border-double border-gray-500 flex justify-center items-center rounded-full">
        +New Post
    </a>
    @endif
    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($posts as $post)
        <div class='relative aspect-w-1 aspect-h-1 w-full h-full'>
            <a href='{{route('posts.show',$post->id)}}' style='text-decoration: none; color: inherit;'>
            <img src="{{ $post->post_image }}" alt="画像が読み込めません。" class="w-full h-full object-cover"/>
            </a>
        </div>
        @endforeach
    </div>
</div>
</x-app-layout>