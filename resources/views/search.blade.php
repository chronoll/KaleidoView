<x-app-layout>
    <x-slot name='header'>
        <div class="flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
        <span class="text-xl">Search</span>
        </div>
    </x-slot>
    <div class="bg-gray-100 w-64 p-4 flex flex-col flex-shrink-0 md:w-50">
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
        @if(isset($results))
            <div class='container'>
                @if($results->isEmpty())
                    <p>No results found.</p>
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