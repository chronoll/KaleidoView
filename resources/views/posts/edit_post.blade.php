<x-app-layout>
    <x-slot name='header'>
        <div class="flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 fill-current text-gray-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
        </svg>
        <a class="text-xl" href={{route('users.show',$category->user->name)}}>{{$category->user->name}}</a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
        </svg>
        <a class="text-xl" href={{route('categories.show',$category->id)}}>{{$category->name}}</a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
        </svg>
        <a class="text-xl" href={{route('posts.show',$post->id)}}>{{$post->title}}</a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
        </svg>
        <span class="text-xl">Edit</span>
        </div>
    </x-slot>
    <x-category-info :category='$category' />
    <div class='flex-1 bg-gray-200 p-4'>
        <form action='/posts/{{$post->id}}' method='POST'>
            @csrf
            @method('PUT')
            <input type="hidden" name="post[category_id]" value="{{ $category->id }}" />
            <input type="hidden" name="post[post_image]" value="{{ $post->post_image }}" />
            <div class='flex justify-center items-center h-full'>
                <img src="{{ $post->post_image }}" alt="画像が読み込めません。"/>
            </div>
            <div class='mt-12 mb-8'>
                <label for="title" class="ml-2 text-sm block">タイトル</label>
                <input id="title" type="text" name="post[title]" class="border-0 outline-none mx-2 mt-2 placeholder-gray-500 placeholder-opacity-50 w-full py-2" placeholder="タイトルを入力" value='{{$post->title}}'>
                <p class="title_error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class='mb-8'>
                <label for="body" class="ml-2 text-sm block">本文</label>
                <textarea id="body" name="post[body]"  class="h-40 border-0 outline-none mx-2 mt-2 placeholder-gray-500 placeholder-opacity-50 w-full py-2" placeholder="本文を入力">{{$post->body}}</textarea>
                <p class='body_error' style='color:red'>{{$errors->first('post.body')}}</p>
            </div>
            <div class="flex justify-end mt-4">
                <input type='submit' value='保存' class="px-4 py-2 bg-green-600 text-white rounded">
            </div>
        </form>
        <form action='/posts/{{$post->id}}' id='form_{{$post->id}}' method='POST' class="mt-2 flex justify-end">
            @csrf
            @method('DELETE')
            <button type='button' onclick='deletePost({{$post->id}})' class="px-4 py-2 bg-red-400 text-white rounded">削除</button>
        </form>
    </div>
</x-app-layout>

<script>
    function deletePost(id){
        'use strict'
        if(confirm('削除すると復元できません\n本当に削除しますか?')){
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
