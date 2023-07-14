<x-app-layout>
    <x-slot name='header'>
        Timeline
    </x-slot>
    <div class='posts'>
        @foreach ($posts as $post)
        <div class='post'>
            <p class='name'>{{'@'.$post->user->name}}-{{$post->category->name}}</p>
            <h2 class='title'>{{$post->title}}</h2>
            <div class='image'>
                <img src="{{ $post->post_image }}" alt="画像が読み込めません。"/>
            </div>
         </div>
        @endforeach
    </div>
</x-app-layout>