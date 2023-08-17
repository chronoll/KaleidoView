<x-app-layout>
    <x-slot name='header'>
        New Post
    </x-slot>
    <x-category-info :category='$category' />
    <div class='bg-gray-200 p-4'>
        <h1>Create a new post</h1>
        <p>{{$category->name}}</p>
        <form action='/posts' method='POST' enctype='multipart/form-data'>
            @csrf
            <input type="hidden" name="post[category_id]" value="{{ $category->id }}" />
            
            <div class='image'>
                <input id='file-input' type='file' name='image' accept='image/*'>
                <div id="crop-image-area" style="display:none;">
                    <div id="croppie"></div>
                    <button type="button" id="crop-button">Crop Image</button>
                </div>
                <div class="preview-cropped-image"></div>
                <input type="hidden" name="cropped_image" id="cropped_image">
                <button type='button' id='reset-file'>Reset File</button>
            </div>
            <p class='content_error' style='color:red'>{{$errors->first('content')}}</p>
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
            <a href='{{route('categories.show',$category->id)}}'>戻る</a>
        </div>
    </div>
</x-app-layout>

<!-- CSS and JS for Croppie -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

<script>
    const fileInput = document.getElementById('file-input');
    const cropImageArea = document.getElementById('crop-image-area');
    const croppieElement = document.getElementById('croppie');
    const croppedImageInput = document.getElementById('cropped_image');
    let croppieInstance = null;

    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                if (croppieInstance) {
                    croppieInstance.destroy();
                }
                croppieInstance = new Croppie(croppieElement, {
                    viewport: {
                        width: 200,
                        height: 200,
                        type: 'square'
                    },
                    boundary: {
                        width: 300,
                        height: 300
                    }
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
            fileInput.value = ""; // トリミング前の画像データをクリア
            document.querySelector('.preview-cropped-image').innerHTML = `<img src="${base64}" alt="Cropped Image" />`;
            cropImageArea.style.display = 'none';
        });
    });

    document.getElementById('reset-file').addEventListener('click', () => {
        fileInput.value = "";
        cropImageArea.style.display = 'none';
        if (croppieInstance) {
            croppieInstance.destroy();
        }
    });
</script>
