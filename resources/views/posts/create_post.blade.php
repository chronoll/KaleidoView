<x-app-layout>
    @section('title',$category->name."の投稿作成")
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
        <span class="text-xl">新規投稿作成</span>
        </div>
    </x-slot>
    <x-category-info :category='$category' />
    <div class='flex-1 bg-gray-200 p-4'>
        <form action='/posts' method='POST' enctype='multipart/form-data'>
            @csrf
            <input type="hidden" name="post[category_id]" value="{{ $category->id }}" />
            <div class='image'>
                <div class="flex justify-between items-center">
                    <input id='file-input' type='file' name='image' accept='image/*'>
                    <button type='button' id='reset-file' class="px-4 py-2 bg-red-400 text-white rounded mr-4">画像をリセット</button>
                </div>
                <div class="relative bg-white m-4 mx-auto flex justify-center items-center" style="width: 400px; height: 400px;">
                    <span class="text-center absolute z-0">画像を選択してください</span>
                    <div id="crop-image-area" class="absolute top-0 left-0 w-full h-full flex justifys-center items-center bg-gray-300 z-10" style="display:none;">
                        <div id="croppie" class="w-full max-w-screen-sm"></div>
                        <button type="button" id="crop-button" class="absolute mt-3 px-4 py-2 bg-blue-600 text-white rounded" style="right: -150px;">トリミング</button>
                    </div>
                    <div class="preview-cropped-image flex justify-center items-center h-full z-10"></div>
                </div>
                <input type="hidden" name="cropped_image" id="cropped_image">
            </div>
            <div class="mt-12 mb-8">
                <input type="hidden" name="post[tag_id]" id="tagId">
                <span class="tag uppercase text-xs bg-green-50 p-0.5 border-gray-500 border rounded text-gray-700 font-medium" data-position="1" data-tag-id="{{ $category->tags[0]->id }}">{{$category->tags[0]->name}}</span>
                <span class="tag uppercase text-xs bg-green-50 p-0.5 border-blue-500 border rounded text-blue-700 font-medium" data-position="2" data-tag-id="{{ $category->tags[1]->id }}" style="display: none;">{{$category->tags[1]->name}}</span>
                <span class="tag uppercase text-xs bg-green-50 p-0.5 border-green-500 border rounded text-green-700 font-medium" data-position="3" data-tag-id="{{ $category->tags[2]->id }}" style="display: none;">{{$category->tags[2]->name}}</span>
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

<script>
    const fileInput = document.getElementById('file-input');
    const cropImageArea = document.getElementById('crop-image-area');
    const croppieElement = document.getElementById('croppie');
    const croppedImageInput = document.getElementById('cropped_image');
    let croppieInstance = null;

    fileInput.addEventListener('change', function() {
    console.log("File input changed!");

    // トリミング後の画像プレビューをクリア
    document.querySelector('.preview-cropped-image').innerHTML = "";
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                if (croppieInstance) {
                    croppieInstance.destroy();
                }
                croppieInstance = new Croppie(croppieElement, {
                    viewport: {
                        width: 300,
                        height: 300,
                        type: 'square'
                    },
                    boundary: {
                        width: 400,
                        height: 400
                    },
                    enforceBoundary: true
                });
                croppieInstance.bind({
                    url: event.target.result
                });
                cropImageArea.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });



    document.getElementById('crop-button').addEventListener('click', function() {
        croppieInstance.result('base64').then(function(base64) {
        console.log(base64);
            croppedImageInput.value = base64; // トリミング後の画像データをフィールドにセット
            document.querySelector('.preview-cropped-image').innerHTML = `<img src="${base64}" alt="Cropped Image" />`;
            cropImageArea.style.display = 'none';
        });
    });

    document.getElementById('reset-file').addEventListener('click', () => {
    fileInput.value = "";
    cropImageArea.style.display = 'none';
    if (croppieInstance) {
        croppieInstance.destroy();
        croppieInstance = null; // 破棄後にnullを代入して明示的にインスタンスをリセット
    }
    document.querySelector('.preview-cropped-image').innerHTML = "";
    croppedImageInput.value = "";
});
    document.addEventListener('DOMContentLoaded', function() {
        let tagElements = document.querySelectorAll('.tag');
        let tagIdField = document.getElementById('tagId');

        tagElements.forEach(tagElement => {
            tagElement.addEventListener('click', function() {
                let position = parseInt(tagElement.getAttribute('data-position'));
                let nextPosition = (position % 3) + 1; 

                // すべてのタグを非表示にする
                tagElements.forEach(el => el.style.display = 'none');
            
                // 次のタグだけを表示する
                let nextTagElement = document.querySelector(`[data-position="${nextPosition}"]`);
                nextTagElement.style.display = 'inline';
            
                // クリックしたタグのdata-tag-idを隠しフィールドにセット
                tagIdField.value = nextTagElement.getAttribute('data-tag-id');
            });
        });
    });
</script>
