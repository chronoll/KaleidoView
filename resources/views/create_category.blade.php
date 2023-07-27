<x-app-layout>
    <x-slot name='header'>
        New Category
    </x-slot>
    <h1>Create  new category</h1>
    <form action='/categories' method='POST' enctype='multipart/form-data'>
        @csrf
        <div class='image'>
            <input id='file-input' type='file' name='image'>
            <button type='button' id='reset-file'>Reset File</button>
        </div>
        <div class='name'>
            <h2>Name</h2>
            <input type='text' name='category[name]' placeholder='カテゴリ名'/>
        </div>
        <div class='explanation'>
            <h2>Explanation</h2>
            <textarea name="category[category_explanation]" placeholder='カテゴリの説明を入力'></textarea>
        </div>
        <input type='submit' value='作成'/>
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