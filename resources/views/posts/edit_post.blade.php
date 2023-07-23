<x-app-layout>
    <x-slot name='header'>
        Edit Post
    </x-slot>
    <h1>Edit your post</h1>
    <p>{{$category->name}}</p>
    <form action='/posts/{{$post->id}}' method='POST' enctype='multipart/form-data'>
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
            <p class="title_error" style="color:red">{{ $errors->first('image') }}</p>
        </div>
        <div class='body'>
            <h2>Body</h2>
            <textarea name="post[body]" placeholder='本文を入力'>{{$post->body}}</textarea>
            <p class='body_error' style='color:red'>{{$errors->first('post.body')}}</p>
        </div>
        <input type='submit' value='保存'/>
    </form>
    <div class='footer'>
        <a href='../'>戻る</a>
    </div>
</x-app-layout>