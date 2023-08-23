<div class="bg-repeat sticky top-0 z-10 h-screen w-64 p-4 flex flex-col flex-shrink-0" style="background-image:url('{{$category->category_image}}'); background-size: 50%;">
    
        <a href='{{route('categories.show',$category->id)}}' class="bg-white hover:bg-gray-300 text-2xl p-4 mb-4 shadow-lg flex justify-center items-center rounded">
            {{$category->name}}
        </a>
        <div class="flex justify-between mt-2 mx-2 items-center flex-col">
            <div class="flex justify-between mx-2 items-center">
                <div>
                    <a href='{{route('users.show',$category->user->name)}}' class="w-20 h-20">
                    <img src="{{ $category->user->user_image }}" alt="説明" class="w-20 h-20 mr-4 rounded-full overflow-full hover:opacity-80 ring-4 ring-gray-400">
                    </a>
                </div>
                <div>
                    <a href='{{route('users.show',$category->user->name)}}' class="flex-1 text-xl p-2 bg-white shadow-lg rounded-lg  font-bold hover:underline text-center">
                    {{'@'.$category->user->name}}
                    </a>
                </div>
            </div>
            
            <div class=" w-full">
                @if (Auth::id() == $category->user->id)
                <a href='{{route('categories.edit',$category->id)}}'>
                    <div class="bg-gray-500 hover:bg-gray-600 text-white font-bold text-center py-2 px-4 rounded-full md:w-full mt-4  mb-3">
                        カテゴリを編集
                    </div>
                </a>
                @else
                    @if(Auth::user()->hasFollowed($category))
                    <!-- フォロー解除 -->
                    <form method='POST' action='{{route('unfollow', $category)}}'>
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            class="bg-gray-500 hover:bg-red-400 text-white font-bold text-center py-2 px-4 rounded-full md:w-full mt-4  mb-3" 
                            onmouseover="changeToUnfollow(this)" 
                            onmouseout="changeToFollowing(this)"
                        >
                            フォロー中
                        </button>
                    </form>
                    @else
                    <!-- フォロー -->
                    <form method='POST' action='{{route('follow', $category)}}'>
                        @csrf
                        <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white font-bold text-center py-2 px-4 md:rounded-full w-full mt-4  mb-3">
                            フォロー
                        </button>
                    </form>
                    @endif
                @endif
        
            </div>
        
            <div class="mb-4 bg-white shadow-lg  font-bold text-center py-2 px-4 rounded w-full mx-1 mb-2">
                フォロワー数: {{$category->followerCount}}
            </div>
            <div class='mb-4 bg-white shadow-lg font-bold text-center py-2 px-4 rounded w-full mx-1 mb-2'>
                総いいね数: {{$category->totalLikes}}
            </div>
            @if(!empty($category->category_explanation))
            <div class='mt-2 bg-white shadow-lg rounded-lg p-2 w-full text-center'>
                {{$category->category_explanation}}
            </div>
            @endif
        </div>
    
</div>
<script>
    function changeToUnfollow(btn) {
        btn.innerText = 'フォロー解除';
    }

    function changeToFollowing(btn) {
        btn.innerText = 'フォロー中';
    }
</script>