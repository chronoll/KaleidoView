<x-app-layout>
    <x-slot name='header'>
        <div class="flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
        <a class="text-xl" href="{{route('search')}}">Search</a>
        @if(isset($term))
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
        </svg>
        @switch($type)
            @case('post')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 fill-current text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                @break
            @case('category')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                </svg>
                @break
            @case('user')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 fill-current text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                @break
            
        @endswitch
        <span class="text-xl">"{{$term}}"</span>
        @endif
        </div>
    </x-slot>
    <div class="bg-gray-100 w-64 h-screen p-4 flex flex-col flex-shrink-0 md:w-50">
    <div class='form-wrapper'>
    <form action='/search' method='GET' id='searchForm'>
        <div class='form-group'>
            <input type='text' name='term' id="term" placeholder='キーワードを入力' class="border-0 outline-none mt-2 placeholder-gray-500 placeholder-opacity-50 w-full p-2">
        </div>
        <div class='form-group flex  justify-between mt-4'>
            <div class="items-start">
                <div>            
                <input type="radio" id="post" name="type" value="post" checked>
                <label for="post">Post</label>
                </div>
                <div>  
                <input type="radio" id="category" name="type" value="category">
                <label for="category">Category</label>
                </div>
                <div>  
                <input type="radio" id="user" name="type" value="user">
                <label for="user">User</label>
                </div>
            </div>
            <div class='form-group flex items-end'>
                <button type='submit' class='button bg-blue-500 text-white mt-2 px-4 py-2 rounded-md hover:bg-blue-600'>検索</button>
            </div>
        </div>
        
    </form>
</div>
    </div>
    <div class='flex-1 p-4 bg-gray-200'>
    <div class='search-results'>
        @if(isset($term))
            <div class='container'>
                @if($results->isEmpty())
                    <div class="flex flex-col h-screen w-full justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-1/5 h-1/5 stroke-current text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                        </svg>
                        <div class="text-xl font-bold text-gray-500 text-center">検索結果：なし</div>
                    </div>

                @else
                    @switch($type)
                        @case('post')
                            <x-post-block :posts='$results' />
                            @break
    
                        @case('category')
                            @foreach($results as $category)
                            <div class="px-8">
                            <x-category-block :category='$category' :posts='$category->posts' />
                            </div>
                            @endforeach
                            @break
    
                        @case('user')
                            @foreach($results as $user)
                            <div class='px-8'>
                                <x-user-block :user='$user'/>
                            </div>
                            @endforeach
                            @break
    
                        @default
                            <p>No results found.</p>
                    @endswitch
                @endif
         </div>
        @endif
    </div>
    </div>
</x-app-layout>
<script>
    document.getElementById('searchForm').addEventListener('submit', function(event) {
        let searchTerm = document.getElementById('term').value.trim();

        if (searchTerm === '') {
            event.preventDefault(); // フォームの送信を停止
            alert('キーワードを入力してください'); // エラーメッセージを表示
        }
    });
</script>