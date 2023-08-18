<x-app-layout>
    <x-slot name='header'>
        <a href='{{route('categories.show',$category->id)}}'>{{$category->name}}</a>
        <a href='{{route('posts.show',$post->id)}}'>>>{{$post->title}}</a>
        <span> >>Edit Post</span>
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
