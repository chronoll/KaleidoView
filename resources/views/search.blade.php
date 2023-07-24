<x-app-layout>
    <x-slot name='header'>
        Search
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
                                <p class='name'>{{'@'.$post->user->name}}-{{$post->category->name}}</p>
                                <h2 class='title'>{{$post->title}}</h2>
                                <div class='image'>
                                    <img src="{{ $post->post_image }}" alt="画像が読み込めません。"/>
                                </div>
                            @endforeach
                            @break
    
                        @case('category')
                            @foreach($results as $result)
                                <h2><a href="{{ url('/categories/' . $result->id) }}">{{ $result->name }}</a></h2>
                            @endforeach
                            @break
    
                        @case('user')
                            @foreach($results as $result)
                                <h2><a href="{{ url('/users/' . $result->name) }}">{{ $result->name }}</a></h2>
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