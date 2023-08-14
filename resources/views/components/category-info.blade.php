<div class="bg-gray-100 w-64 p-4 flex flex-col flex-shrink-0">
    <div class='sticky top-0 z-10'>
        <a href='{{route('categories.show',$category->id)}}' class="hover:bg-gray-300 text-2xl p-4 mb-4 border-4 border-double border-gray-500 flex justify-center items-center rounded-full">
            {{$category->name}}
        </a>
        <div class="flex justify-between mt-2 mx-2 items-center flex-row md:flex-col">
            <a href='{{route('users.show',$category->user->name)}}'>
            <img src="{{ $category->user->user_image }}" alt="説明" class="w-20 h-20 mr-4 rounded-full overflow-full hover:opacity-80 ring-4 ring-gray-400">
            </a>
            <a href='{{route('users.show',$category->user->name)}}' class="flex-1 font-bold hover:underline text-center">
            {{'@'.$category->user->name}}
            </a>
        
        
        @if (Auth::id() == $category->user->id)
        <a href='{{route('categories.edit',$category->id)}}'>
            <div class="bg-gray-500 hover:bg-gray-600 text-white font-bold text-center py-2 px-4 rounded-full md:w-full mt-4 mx-1 mb-3">
                Edit
            </div>
        </a>
        @else
            @if(Auth::user()->hasFollowed($category))
            <!-- フォロー解除 -->
            <form method='POST' action='{{route('unfollow', $category)}}'>
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="bg-gray-500 hover:bg-red-400 text-white font-bold text-center py-2 px-4 rounded-full md:w-full mt-4 mx-1 mb-3" 
                        onmouseover="changeToUnfollow(this)" 
                        onmouseout="changeToFollowing(this)"
                >
                    Following
                </button>
            </form>
            @else
            <!-- フォロー -->
            <form method='POST' action='{{route('follow', $category)}}'>
                @csrf
                <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white font-bold text-center py-2 px-4 md:rounded-full w-full mt-4 mx-1 mb-3">
                    Follow
                </button>
            </form>
            @endif
        @endif
        
        </div>
        
        <div class="mb-4 border-4 border-double border-gray-500  font-bold text-center py-2 px-4 rounded-full w-full mx-1 mb-2">
            Followers: {{$category->followerCount}}
        </div>
        <div class='mb-4 border-4 border-double border-gray-500  font-bold text-center py-2 px-4 rounded-full w-full mx-1 mb-2'>
            Total likes: {{$category->totalLikes}}
        </div>
        <div class='mt-4 border-4 border-double border-gray-500 rounded-lg p-2'>
            {{$category->category_explanation}}
        </div>
        
    </div>
</div>
<script>
    function changeToUnfollow(btn) {
        btn.innerText = 'Unfollow';
    }

    function changeToFollowing(btn) {
        btn.innerText = 'Following';
    }
</script>