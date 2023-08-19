<x-app-layout>
    <x-slot name='header'>
      
    </x-slot>
    <div class='flex-1 bg-gray-200 p-4'>
        <form action='/posts' method='POST' enctype='multipart/form-data'>
            @csrf
            
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

<script>
    const fileInput = document.getElementById('file-input');
    const cropImageArea = document.getElementById('crop-image-area');
    const croppieElement = document.getElementById('croppie');
    const croppedImageInput = document.getElementById('cropped_image');
    let croppieInstance = null;

    fileInput.addEventListener('change', function() {
    
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
</script>
