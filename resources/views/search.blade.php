<x-app-layout>
    <x-slot name='header'>
        <div class="flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
        <span class="text-xl">Search</span>
        </div>
    </x-slot>
    <div class='form-wrapper'>
        <form action='/search' method='GET'>
            <div class='form-group'>
                <label for='term'>Search:</label>
                <input type='text' name='term' placeholder='Search'>
            </div>
            <div class='form-group'>
                <label for='type'>Search Type:</label>
                <select class='form-control' name='type'>
                    <option value='post'>Post</option>
                    <option value='category'>Category</option>
                    <option value='user'>User</option>
                </select>
            </div>
            <div class='form-group'>
                <button type='submit' class='button'>Search</button>
            </div>
        </form>
    </div>
    <div class='search-results'>
        @if(isset($results))
            <h2>Results</h2>
            <div class='container'>
                @if($results->isEmpty())
                    <p>No results found.</p>
                @else
                    @switch($type)
                        @case('post')
                            @foreach($results as $post)
                            <div class='post'>
                                <div class='user'>
                                    <a href='{{route('users.show',$post->user->name)}}' style='text-decoration: none; color: inherit;'>
                                    <img src="{{ $post->user->user_image }}" alt="画像が読み込めません。"/>
                                    </a>
                                </div>
                                <div class='category'>
                                    <a href='{{route('categories.show',$post->category->id)}}' style='text-decoration: none; color: inherit;'>
                                    <p class='name'>{{'@'.$post->user->name}}-{{$post->category->name}}</p>
                                    </a>
                                </div>
                                <a href='{{route('posts.show',$post->id)}}' style='text-decoration: none; color: inherit;'>
                                <h2 class='title'>{{$post->title}}</h2>
                                <div class='image'>
                                    <img src="{{ $post->post_image }}" alt="画像が読み込めません。"/>
                                </div>
                                </a>
                            </div>
                            @endforeach
                            @break
    
                        @case('category')
                            @foreach($results as $category)
                            <div class='category'>
                                <a href='{{route('categories.show',$category->id)}}' style='text-decoration: none; color: inherit;'>
                                <img src='{{$category->category_image}}'/>
                                <h3>{{$category->name}}</h3>
                                </a>
                            </div>
                            @endforeach
                            @break
    
                        @case('user')
                            @foreach($results as $user)
                            <div class='user'>
                                <a href='{{route('users.show',$user->name)}}' style='text-decoration: none; color: inherit;'>
                                <img src="{{ $user->user_image }}" alt="画像が読み込めません。"/>
                                <p class='name'>{{'@'.$user->name}}</p>
                                <p class='nickname'>{{'@'.$user->nickname}}</p>
                                <h2 class='self_introduction'>{{$user->self_introduction}}</h2>
                                </a>
                            </div>
                            @endforeach
                            @break
    
                        @default
                            <p>No results found.</p>
                    @endswitch
                @endif
         </div>
        @endif
    </div>
</x-app-layout>