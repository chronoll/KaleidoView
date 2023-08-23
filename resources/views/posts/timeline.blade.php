<x-app-layout>
    <x-slot name='header'>
        <div class="flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
        </svg>
        <span class="text-xl">タイムライン</span>
        </div>
    </x-slot>
    <div class='bg-gray-100 w-64 p-4 flex flex-col flex-shrink-0 md:w-50'>
        <div class="sticky h-screen top-0 z-10">
            <div class="text-2xl p-4 mb-4 flex justify-center items-center rounded-full">
                フォロー中
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
    <x-post-block :posts='$posts' />
</div>

</x-app-layout>