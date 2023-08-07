<div>
    <div class='user'>
        <div class='user_image'></div>
        <div class='user_name'></div>
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