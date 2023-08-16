<x-app-layout>
    <x-slot name='header'>
        Profile-{{$user->name}}
    </x-slot>
<div class="relative flex justify-center md:block flex-auto" >
    <!-- Edit button -->
    <div class="absolute top-1.5 right-0">
        @if (Auth::id() == $user->id)
        <a href="{{route('users.edit',$user->name)}}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
        @endif
    </div>
    <div class="block">
    <!-- User information -->
    <div class='flex flex-col items-center p-4 mx-auto w-5/12'>
        <img src='{{$user->user_image}}' class="w-56 h-56 mr-4 rounded-full overflow-full ring-4 ring-gray-400" alt="{{$user->name}}'s image"/>
        <div class='w-full flex justify-between mt-8 space-x-4'>
            <div class="flex justify-center items-center w-1/2 h-12 mb-4 border-4 border-double border-gray-500  font-bold text-center px-4 rounded-full mb-2">{{'@'.$user->name}}</div>
            <div class="flex justify-center items-center w-1/2 h-12 border-4 border-double border-gray-500  font-bold text-center px-4 rounded-full mb-2">{{$user->nickname}}</div>
        </div>
        <div class='w-full mt-4 border-4 border-double border-gray-500 rounded-lg p-2 text-center'>{{$user->self_introduction}}</div>
    </div>
    
    <div class='flex flex-col items-center'>
        @foreach($categories as $category)
        <div class='category'>
            <a href='{{route('categories.show',$category->id)}}' style='text-decoration: none; color: inherit;'>
            <img src='{{$category->category_image}}'/>
            <h3>{{$category->name}}</h3>
            <div class='followers'>
                <h3>Followers({{$followers[$category->id]->count()}})</h3>
            </div>
            <div class='total_likes'>
                <h3>Total likes: {{$category->totalLikes}}</h3>
            </div>
            </a>
            <div class='posts'>
                @foreach($posts[$category->id]->sortByDesc('created_at')->take(3) as $post)
                <a href='{{route('posts.show',$post->id)}}' style='text-decoration: none; color: inherit;'>
                <img src='{{$post->post_image}}'/>
                </a>
                @endforeach
                @if($posts[$category->id]->count()>3)
                <small>+{{$posts[$category->id]->count()-3}}</small>
                @endif
            </div>
        </div>
        @endforeach
        <div class='new_category'>
            @if (Auth::id() == $user->id)
            <a href='{{route('categories.create')}}'>New Category</a>
        @endif
        </div>
    </div>
    </div>
</div>

    
</x-app-layout>