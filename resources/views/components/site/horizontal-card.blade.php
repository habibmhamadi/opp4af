<article class="bg-white rounded shadow flex flex-col p-3 gap-y-5">
    <div class="flex gap-x-4 items-center">
        <img class="w-16 h-16 bg-cover rounded" src="{{asset('img/cover.png')}}" alt="">
        <a href="" class="hover:text-blue-500">
            <h2 class="overflow-hidden overflow-ellipsis text-lg" style="-webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical;">{{$opportunity->name}}</h2>
        </a>
    </div>
    <div class="flex justify-between text-gray-500">
        <div class="flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
            <h3 class="text-sm">{{ $opportunity->category->name }}</h3>
        </div>
        <h3 class="text-sm">{{ $opportunity->deadline->diffForHumans() }}</h3>
    </div>
</article>
