<x-app-layout>
    <x-slot name='header'>
        Profile
    </x-slot>
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
        </div>
        @endforeach
    </div>
</x-app-layout>