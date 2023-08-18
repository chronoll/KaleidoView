<x-app-layout>
    <x-slot name='header'>
        Edit Post
    </x-slot>
    <x-category-info :category='$category' />
    <div class='bg-gray-200 p-4'>
    <form action='/posts/{{$post->id}}' method='POST'>
        @csrf
        @method('PUT')
        <input type="hidden" name="post[category_id]" value="{{ $category->id }}" />
        <input type="hidden" name="post[post_image]" value="{{ $post->post_image }}" />
        <div class='image'>
            <img src="{{ $post->post_image }}" alt="画像が読み込めません。"/>
        </div>
        <div class='title'>
            <h2>Title</h2>
            <input type='text' name='post[title]' placeholder='タイトル' value='{{$post->title}}'/>
            <p class="title_error" style="color:red">{{ $errors->first('post.title') }}</p>
        </div>
        <div class='body'>
            <h2>Body</h2>
            <textarea name="post[body]" placeholder='本文を入力'>{{$post->body}}</textarea>
            <p class='body_error' style='color:red'>{{$errors->first('post.body')}}</p>
        </div>
        <input type='submit' value='保存'/>
    </form>
    <form action='/posts/{{$post->id}}' id='form_{{$post->id}}'method='POST'>
              @csrf
              @method('DELETE')
              <button type='button' onclick='deletePost({{$post->id}})'>delete</button>
          </form>
    <div class='footer'>
        <a href='{{route('posts.show',$post->id)}}'>戻る</a>
    </div>
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
<x-app-layout>
    <x-slot name='header'>
        <a href='{{route('categories.show',$category->id)}}'>>>{{$category->name}}</a>
        <a href='{{route('posts.show',$post->id)}}'>>>{{$post->name}}</a>
        <span> >>Edit Post</span>
    </x-slot>
    <x-category-info :category='$category' />
    <div class='flex-1 bg-gray-200 p-4'>
        <form action='/posts' method='POST' enctype='multipart/form-data'>
            @csrf
            <input type="hidden" name="post[category_id]" value="{{ $category->id }}" />
            <div class='image'>
                <div class="flex justify-between items-center">
                    <input id='file-input' type='file' name='image' accept='image/*'>
                    <button type='button' id='reset-file' class="px-4 py-2 bg-red-400 text-white rounded mr-4">Reset File</button>
                </div>
                <div class="relative bg-white m-4 mx-auto flex justify-center items-center" style="width: 400px; height: 400px;">
                    <span class="text-center absolute z-0">画像を選択してください</span>
                    <div id="crop-image-area" class="absolute top-0 left-0 w-full h-full flex justifys-center items-center bg-gray-300 z-10" style="display:none;">
                        <div id="croppie" class="w-full max-w-screen-sm"></div>
                        <button type="button" id="crop-button" class="absolute mt-3 px-4 py-2 bg-blue-600 text-white rounded" style="right: -150px;">Crop Image</button>
                    </div>
                    <div class="preview-cropped-image flex justify-center items-center h-full z-10"></div>
                </div>
                <input type="hidden" name="cropped_image" id="cropped_image">
            </div>
            <div class="mt-12 mb-8">
                <label for="title" class="ml-2 text-sm block">タイトル</label>
                <input id="title" type="text" name="post[title]" class="border-0 outline-none mx-2 mt-2 placeholder-gray-500 placeholder-opacity-50 w-full py-2" placeholder="タイトルを入力">
            </div>
            <div class="mb-8">
                <label for="body" class="ml-2 text-sm block">本文</label>
                <textarea id="body" name="post[body]"  class="h-40 border-0 outline-none mx-2 mt-2 placeholder-gray-500 placeholder-opacity-50 w-full py-2" placeholder="本文を入力"></textarea>
            </div>
            <div class="flex justify-end mt-4">
                <input type='submit' value='投稿' class="px-4 py-2 bg-green-600 text-white rounded">
                </div>
        </form>
    </div>
</x-app-layout>