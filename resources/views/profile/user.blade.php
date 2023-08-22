<x-app-layout>
    <x-slot name='header'>
        <div class="flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 fill-current text-gray-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
        </svg>
        <a class="text-xl" href={{route('users.show',$user->name)}}>{{$user->name}}</a>
        </div>
    </x-slot>
<div class="relative flex justify-center md:block flex-auto" >
    <div class="absolute top-1.5 right-0">
        @if (Auth::id() == $user->id)
        <a href="{{route('users.edit',$user->name)}}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
        @endif
    </div>
    <div class="block bg-gray-200 h-screen">
    <div class='flex flex-col items-center p-4 mx-auto w-5/12'>
        <img src='{{$user->user_image}}' class="w-56 h-56 mr-4 rounded-full overflow-full ring-4 ring-gray-400" alt="{{$user->name}}'s image"/>
        <div class='w-full flex justify-between mt-8 space-x-4'>
            <div class="flex justify-center items-center w-1/2 h-12 mb-4 bg-white border-4 border-double border-gray-500  font-bold text-center px-4 rounded-full mb-2">{{'@'.$user->name}}</div>
            <div class="flex justify-center items-center w-1/2 h-12 bg-white border-4 border-double border-gray-500  font-bold text-center px-4 rounded-full mb-2">{{$user->nickname}}</div>
        </div>
        @if(!empty($user->self_introduction))
        <div class='w-full mt-4 bg-white border-4 border-double border-gray-500 rounded-lg p-2 text-center'>{{$user->self_introduction}}</div>
        @endif
    </div>
    
    <div class='flex flex-col items-center w-full'>
        @foreach($categories as $category)
        <div class="w-3/4">
        <x-category-block :category='$category' :posts='$category->posts' />
        </div>
        @endforeach
        
        @if (Auth::id() == $user->id)
            <a href='{{route('categories.create')}}' class="w-3/4">
                <div class="shadow-lg bg-white hover:bg-gray-500 font-bold text-center py-2 px-4 rounded-full md:w-full mt-4 mx-1 mb-3">
                    +New Category
                </div>
            </a>
            @endif

    </div>
    </div>
</div>

    
</x-app-layout>