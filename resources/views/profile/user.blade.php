<x-app-layout>
    <x-slot name='header'>
        Profile
    </x-slot>
    <div class='edit'>
        @if (Auth::id() == $user->id)
        <a href="/users/edit">Edit</a>
        @endif
    </div>
    <div class='user'>
        <img src='{{$user->user_image}}'/>
        <div class='names'>
            <h3>{{'@'.$user->name}}</h3>
            <h3>{{$user->nickname}}</h3>
        </div>
        <p class='self_introduction'>{{$user->self_introduction}}</p>
    </div>
    <div class='categories'>
        @foreach($categories as $category)
        <div class='category'>
            <img src='{{$category->category_image}}'/>
            <h3>{{$category->name}}</h3>
            <div class='followers'>
                <h3>Followers({{$followers[$category->id]->count()}})</h3>
            </div>
            <div class='posts'>
                @foreach($posts[$category->id]->sortBy('created_at')->take(3) as $post)
                <img src='{{$post->post_image}}'/>
                @endforeach
                @if($posts[$category->id]->count()>3)
                <small>+{{$posts[$category->id]->count()-3}}</small>
                @endif
            </div>
        </div>
        @endforeach
        <div class='new_category'>
            @if (Auth::id() == $user->id)
            <a href="/categories/edit">New Category</a>
        @endif
        </div>
    </div>
</x-app-layout>