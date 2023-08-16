<x-app-layout>
    <x-slot name='header'>
        Profile-{{$user->name}}
    </x-slot>
<div class="relative flex justify-center md:block flex-auto" >
    <!-- Edit button -->
    <div class="absolute top-1.5 right-0">
        @if (Auth::id() == $user->id)
        <a href="{{route('users.edit',$user->name)}}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
        @endif>
    </div>
    <div class="block bg-gray-200">
    <!-- User information -->
    <div class='flex flex-col items-center p-4 mx-auto w-5/12'>
        <img src='{{$user->user_image}}' class="w-56 h-56 mr-4 rounded-full overflow-full ring-4 ring-gray-400" alt="{{$user->name}}'s image"/>
        <div class='w-full flex justify-between mt-8 space-x-4'>
            <div class="flex justify-center items-center w-1/2 h-12 mb-4 bg-white border-4 border-double border-gray-500  font-bold text-center px-4 rounded-full mb-2">{{'@'.$user->name}}</div>
            <div class="flex justify-center items-center w-1/2 h-12 bg-white border-4 border-double border-gray-500  font-bold text-center px-4 rounded-full mb-2">{{$user->nickname}}</div>
        </div>
        <div class='w-full mt-4 bg-white border-4 border-double border-gray-500 rounded-lg p-2 text-center'>{{$user->self_introduction}}</div>
    </div>
    
    <div class='flex flex-col items-center w-full'>
        @foreach($categories as $category)
        <x-category-block :category='$category' :posts='$posts' />
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