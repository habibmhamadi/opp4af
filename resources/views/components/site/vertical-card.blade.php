
<article class="rounded shadow flex flex-col gap-2 pb-1">
    <img class="bg-cover h-52" src="{{$opportunity->getImageUrl()}}" loading="lazy" alt="{{$opportunity->slug}}">
    <div class="flex flex-col gap-2 px-2">
        <div class="flex items-center text-gray-400">
            <svg class="w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
            <p class="text-sm">{{ $opportunity->category->name}}</p>
        </div>
        <a href="{{ route('opportunity', $opportunity->slug)}}" class="text-xl hover:text-blue-500">
            <h1>{{ $opportunity->name }}</h1>
        </a>
        <div class="flex gap-x-2 text-gray-500 text-sm font-semibold">
            <h2>
                {{ $opportunity->locations->first()->name }}

            </h2>
            <span>|</span>
            <h2>{{ $opportunity->fund->name }}</h2>
        </div>
    </div>
</article>
