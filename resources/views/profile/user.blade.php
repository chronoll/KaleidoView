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
        <p class='self_introduction'>{{$user->selt_introduction}}</p>
    </div>
</x-app-layout>