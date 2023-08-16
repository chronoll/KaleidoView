
<div class="w-3/4 h-80 bg-white shadow-lg rounded-lg ease-in transition duration-200 transform hover:scale-105 cursor-pointer flex flex-col justify-between relative my-4" data-href="{{route('categories.show',$category->id)}}"> <!-- relative added here -->
    <div class="h-48 w-full bg-gray-200 flex flex-col justify-between rounded-lg p-4 bg-cover bg-center" style="background-image: url('{{$category->category_image}}')">
    </div>

    <div class="absolute right-0 bottom-0 z-10 flex">
        @foreach($posts[$category->id]->sortByDesc('created_at')->take(3) as $post)
            <a href='{{route('posts.show',$post->id)}}'>
                <img src='{{$post->post_image}}' class="w-48 h-48 mx-2 my-4 rounded shadow"/>
            </a>
        @endforeach
        @if($posts[$category->id]->count()>3)
        <div class="self-end mx-2 my-6 text-gray-600 border-4 border-double border-gray-500 rounded-lg p-2 shadow">+{{$posts[$category->id]->count()-3}}</div>
        @endif
    </div>

    <div class="p-4">
        <div class="flex items-center mb-2 space-x-4"> <!-- mb-2を追加して、上の行と下の行の間にマージンを追加します -->
            <h1 class="text-gray-600 text-3xl">{{$category->name}}</h1>
            <p class="text-gray-400">{{'@'.$category->user->name}}</p>
        </div>
        <div class="flex items-center space-x-4">
            <span class="uppercase text-xs bg-green-50 p-0.5 border-green-500 border rounded text-green-700 font-medium">Followers: {{$category->followerCount}}</span>
            <span class="uppercase text-xs bg-green-50 p-0.5 border-green-500 border rounded text-green-700 font-medium">Total likes: {{$category->totalLikes}}</span>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const clickableCards = document.querySelectorAll('[data-href]');

        clickableCards.forEach(card => {
            card.addEventListener('click', function (event) {
                if (!event.target.closest('a')) {  // リンク内のクリックを無視
                    window.location.href = card.getAttribute('data-href');
                }
            });
        });
    });
</script>