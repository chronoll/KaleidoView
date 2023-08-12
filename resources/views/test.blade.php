<x-app-layout>
    <x-slot name='header'>
        Category
    </x-slot>
    <!-- サイドバー -->
    <div class="bg-gray-100 w-1/4 p-4 flex flex-col flex-shrink-0">
        <div class="sticky top-0 z-10">
        <!-- 上の文章 -->
        <a href='{{route('categories.show',1)}}' class="hover:bg-gray-300 text-2xl p-4 mb-4 border-4 border-double border-gray-500 flex justify-center items-center rounded-full">
            音楽
        </a>

        <!-- 画像と隣接する文章 -->
        <div class="flex justify-between mt-2 mx-2 items-center">
            <!-- 画像 -->
            <a href='{{route('users.show','Hanako')}}'>
            <img src="https://res.cloudinary.com/dig0xnvus/image/upload/v1690526149/aye9tbymcqemie2uqbeu.png" alt="説明" class="w-20 h-20  mr-4 rounded-full overflow-full hover:opacity-80 ring-4 ring-gray-400">
            </a>
            <!-- 文章 -->
            <a href='{{route('users.show','Hanako')}}' class="flex-1 font-bold hover:underline text-center">
                @Hanakooooo
            </a>
        </div>

        <div class="bg-gray-500 hover:bg-gray-600 text-white font-bold text-center py-2 px-4 rounded-full w-full mt-4 mx-1 mb-3">
            <a href='{{route('categories.edit',1)}}'>Edit</a>
        </div>

        <div class="mb-4 border-4 border-double border-gray-500  font-bold text-center py-2 px-4 rounded-full w-full mx-1 mb-2">
            <p>Followers: 50</p>
        </div>
        <div class='mb-4 border-4 border-double border-gray-500  font-bold text-center py-2 px-4 rounded-full w-full mx-1 mb-2'>
            <p>Total likes: 100</p>
        </div>

        <div class='mt-4 border-4 border-double border-gray-500 rounded-lg p-2'>
            写真撮影は私の人生に色と魔法を与えてくれる素晴らしい趣味です。一瞬を切り取り、感動や美しさを永遠に残すことができます。光の魔法を使い、色彩と構図を織り交ぜながら、美しいコンポジションを追求しています。写真は私の心の中で語り手となり、感情や思い出を表現する窓となっています。一緒に写真の魔法に浸り、新たな世界を切り拓きましょう。
        </div>
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