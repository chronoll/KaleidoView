<x-app-layout>
    <x-slot name='header'>
        Edit User
    </x-slot>
    <h1>Edit your User Information</h1>
    <form action='/users/{{$user->name}}' method='POST' enctype='multipart/form-data'>
        @csrf
        @method('PUT')
        <div class='image'>
            <input id='file-input' type='file' name='image'>
            <button type='button' id='reset-file'>Reset File</button>
        </div>
        <div class='nickname'>
            <h2>Nickname</h2>
            <input type='text' name='user[nickname]' placeholder='ニックネーム' value='{{$user->nickname}}'/>
        </div>
        <div class='self_introduction'>
            <h2>Self Introduction</h2>
            <textarea name="user[self_introduction]" placeholder='自己紹介'>{{$user->self_introduction}}</textarea>
        </div>
        <input type='submit' value='保存'/>
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