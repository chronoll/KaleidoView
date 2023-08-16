<x-app-layout>
    <x-slot name='header'>
        Category
    </x-slot>
    <!-- サイドバー -->
    <div class="bg-gray-100 w-64 p-4 flex flex-col flex-shrink-0 md:w-50">
        <div class="sticky top-0 z-10">
        <!-- 上の文章 -->
        <div class="text-2xl p-4 mb-4 flex justify-center items-center rounded-full">
            Following
        </div>
    <a href="/">
    <div class="h-24 bg-white rounded-lg shadow-lg ease-in transition duration-200 transform hover:scale-105 mb-4">
    <div class="h-12 w-full bg-gray-200 rounded-t-lg flex flex-col justify-between p-4 bg-cover bg-center" style="background-image: url('https://cdn-icons-png.flaticon.com/512/3135/3135715.png')">
    </div>
        <div class="flex items-center mb-2 space-x-4 px-2 pt-3 pb-1">
            <h1 class="text-gray-600">音楽</h1>
            <p class="text-gray-400 text-sm">@Hanako</p>
        </div>
    </div>
    </a>
    
    <a href="/">
    <div class="h-24 bg-white rounded-lg shadow-lg ease-in transition duration-200 transform hover:scale-105 mb-4">
    <div class="h-12 w-full bg-gray-200 rounded-t-lg flex flex-col justify-between p-4 bg-cover bg-center" style="background-image: url('https://cdn-icons-png.flaticon.com/512/3135/3135715.png')">
    </div>
        <div class="flex items-center mb-2 space-x-4 px-2 pt-3 pb-1">
            <h1 class="text-gray-600">音楽</h1>
            <p class="text-gray-400 text-sm">@Hanako</p>
        </div>
    </div>
    </a>
    
    <a href="/">
    <div class="h-24 bg-white rounded-lg shadow-lg ease-in transition duration-200 transform hover:scale-105 mb-4">
    <div class="h-12 w-full bg-gray-200 rounded-t-lg flex flex-col justify-between p-4 bg-cover bg-center" style="background-image: url('https://cdn-icons-png.flaticon.com/512/3135/3135715.png')">
    </div>
        <div class="flex items-center mb-2 space-x-4 px-2 pt-3 pb-1">
            <h1 class="text-gray-600">音楽</h1>
            <p class="text-gray-400 text-sm">@Hanako</p>
        </div>
    </div>
    </a>
        
    </div>
    </div>

    <div class="flex-1 bg-blue-500 p-4">
    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
    @for ($i = 0; $i < 40; $i++)
    <div class="relative aspect-w-1 aspect-h-1">

        <!-- もしくはUnsplash Sourceを使用 -->
        <img src="https://source.unsplash.com/random/200x200?sig={{ $i }}" alt="Random Image" class="absolute inset-0 w-full h-full">
    </div>
    @endfor
</div>
</div>
    
    
    
</x-app-layout>