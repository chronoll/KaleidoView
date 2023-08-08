<x-app-layout>
    <x-slot name='header'>
        Edit Post
    </x-slot>
    <x-category-info :category='$category' />
    <h1>Edit your post</h1>
    <p>{{$category->name}}</p>
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
</x-app-layout>
<script>
    function deletePost(id){
        'use strict'
        if(confirm('削除すると復元できません\n本当に削除しますか?')){
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>