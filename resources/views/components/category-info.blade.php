<div>
    <div class='user'>
        <div class='user_image'>
            <a href='{{route('users.show',$category->user->name)}}' style='text-decoration: none; color: inherit;'>
            <img src="{{ $category->user->user_image }}" alt="画像が読み込めません。"/>
            </a>
        </div>
        <div class="border border-red-500">
            <p>{{'@'.$category->user->name}}</p>
        </div>
    </div>
    <a href='{{route('categories.show',$category->id)}}' style='text-decoration: none; color: inherit;'>
    <h1>{{$category->name}}</h1>
    <div class='followers'>
        <p>Followers {{$category->followerCount}}</p>
    </div>
    <div class='total_likes'>
        <p>Total likes: {{$category->totalLikes}}</p>
    </div>
    <div class='explanation'>
        <p>{{$category->category_explanation}}</p>
    </div>
    <div class='edit'>
        @if (Auth::id() == $category->user->id)
        <a href='{{route('categories.edit',$category->id)}}'>Edit</a>
        @else
            @if(Auth::user()->hasFollowed($category))
            <!--　フォロー解除 -->
            <form method='POST' action='{{route('unfollow',$category)}}'>
                @csrf
                @method('DELETE')
                <input type='submit' value='unfollow'/>
            </form>
            @else
            <!--　フォロー -->
            <form method='POST' action='{{route('follow',$category)}}'>
                @csrf
                <input type='submit' value='follow'/>
            </form>
            @endif
        @endif
    </div>
    </a>
</div>