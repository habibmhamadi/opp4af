<article class="bg-white shadow-sm border rounded overflow-hidden border-gray-200 mb-5">
    <img class="w-full h-60 md:h-48 object-cover" loading="lazy" src="{{$post->getImageUrl()}}" alt="{{$post->name}}">
    <div class="p-3 h-44">
        <a href="{{route('post', $post->slug)}}" class="hover:text-blue-500">
            <h5 class="font-bold text-2xl tracking-tight overflow-hidden overflow-ellipsis" style="-webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical;">{{$post->name}}</h5>
        </a>
        <p class="text-xs text-gray-500 py-2 mt-1">{{$post->created_at->diffForHumans()}}</p>
        <p class="text-gray-700 overflow-hidden overflow-ellipsis" style="-webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical;">{{$post->short_description}}</p>
    </div>
</article>
