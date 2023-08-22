<a href="{{route('users.show',$user->name)}}" class="h-32">
<div class="bg-white h-32 my-8 rounded-lg shadow-lg ease-in transition duration-200 transform hover:scale-105">
    <div class="flex justify-start p-2 h-full w-full ">
        <div class="flex h-full mx-4 items-center justify-center flex-shrink-0">
            <img src="{{$user->user_image}}" class="w-20 h-20 rounded-full overflow-full ring ring-gray-400">
        </div>
        <div class="flex flex-col items-start w-full">
            <div class=" flex items-center">
                <span class=" text-xl text-gray-800">{{'@'.$user->name}}</span>
                <span class="ml-4 text-xl text-gray-800">{{$user->nickname}}</span>
            </div>
            <div class="flex mt-2 grow w-full rounded bg-gray-200 p-3 overflow-hidden">
                <div class="line-clamp-2">{{$user->self_introduction}}</div>
            </div>
        </div>
    </div>
                    
</div>
</a>
