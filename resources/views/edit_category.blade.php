<x-app-layout>
    <x-slot name='header'>
        Edit Category
    </x-slot>
    <h1>Edit your category</h1>
    <form action='/categories/{{$category->id}}' method='POST' enctype='multipart/form-data'>
        @csrf
        @method('PUT')
        <div class='image'>
            <input id='file-input' type='file' name='image'>
            <button type='button' id='reset-file'>Reset File</button>
        </div>
        <div class='name'>
            <h2>Name</h2>
            <input type='text' name='category[name]' placeholder='カテゴリ名' value='{{$category->name}}'/>
        </div>
        <div class='explanation'>
            <h2>Explanation</h2>
            <textarea name="category[category_explanation]" placeholder='カテゴリの説明を入力'>{{$category->category_explanation}}</textarea>
        </div>
        <input type='submit' value='保存'/>
    </form>
    <form action='/categories/{{$category->id}}' id='form_{{$category->id}}'method='POST'>
        @csrf
        @method('DELETE')
        <button type='button' onclick='deletePost({{$category->id}})'>delete</button>
    </form>
    <div class='footer'>
        <a href='../'>戻る</a>
    </div>
</x-app-layout>
<script>
document.getElementById('reset-file').addEventListener('click', () => {
    document.getElementById('file-input').value = "";
});
function deletePost(id){
    'use strict'
    if(confirm('投稿も含めて削除されます\n本当に削除しますか?')){
        document.getElementById(`form_${id}`).submit();
        
    }
}
</script>