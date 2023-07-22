<x-app-layout>
    <x-slot name='header'>
        New Post
    </x-slot>
    <h1>Create a new post</h1>
    <p>{{$category->name}}</p>
    <form action='/posts' method='POST' enctype='multipart/form-data'>
        @csrf
        <input type="hidden" name="post[category_id]" value="{{ $category->id }}" />
        <div class='image'>
            <input id='file-input' type='file' name='image' accept='image/*'>
            <button type='button' id='reset-file'>Reset File</button>
        </div>
        <div class='title'>
            <h2>Title</h2>
            <input type='text' name='post[title]' placeholder='タイトル'/>
        </div>
        <div class='body'>
            <h2>Body</h2>
            <textarea name="post[body]" placeholder='本文を入力'></textarea>
        </div>
        <input type='submit' value='投稿'/>
    </form>
    <div class='footer'>
        <a href='../'>戻る</a>
    </div>
</x-app-layout>
<script>
document.getElementById('reset-file').addEventListener('click', () => {
    document.getElementById('file-input').value = "";
});
</script>