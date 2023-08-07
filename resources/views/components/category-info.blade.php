<div>
    <div class='user'>
        <div class='user_image'>
            <img src="{{ $category->user->user_image }}" alt="画像が読み込めません。"/>
        </div>
        <div class='user_name'>
            <p>{{'@'.$category->user->name}}</p>
        </div>
    </div>
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
</div>