@extends('layouts.site.app')

@section('head')
    <title>Opp4af - {{$opportunity->name}}</title>
    <meta name="title" content="Opp4af - {{$opportunity->name}}">
    <meta name="description" content="Opp4af is about exploring latest opportunities containing scholarships, internships, jobs, workshops, fellowships, competitions, courses, online events and more.">
    <meta property="og:type" content="article">
    <meta property="og:title" content="OPP4AF - {{$opportunity->name}}">
    <meta property="og:url" content="https://www.opp4af.com/{{$opportunity->slug}}">
    <meta property="og:site_name" content="Opportunity for Afghans">
    <meta property="og:image" content="{{$opportunity->getImageUrl()}}">

@endsection

@section('content')
    <section id="article_title" class="w-full py-16" style="background-image: url('{{ asset('img/cover.png') }}');">
        <div class="bg-white p-5 shadow lg:mx-56 mx-12 rounded">
            <article class="flex flex-col sm:flex-row gap-4">
                <img class="w-28 h-28 rounded bg-cover" src="{{$opportunity->getImageUrl()}}" alt="">
                <div class="flex flex-col justify-around gap-1.5">
                    <h1 class="text-2xl"> {{ $opportunity->name }}</h1>
                        <div class="flex items-center text-gray-400">
                            <svg class="w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                            <p class="text-sm">{{ $opportunity->category->name }}</p><br>
                        </div>
                    <div class="text-xs font-semibold text-gray-600">
                        <span class="mr-0.5">
                            @foreach($opportunity->areas as $area)
                                {{ $area->name.($loop->iteration == count($opportunity->areas) ? '' : ',') }}
                            @endforeach
                        </span>
                    </div>

                </div>
            </article>
        </div>
    </section>

    <section id="content" class="w-full bg-white lg:px-24 px-4 py-16">
        <h1 class="text-2xl uppercase font-bold pb-4 border-b border-gray-500 inline">Opportunity Details</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 mt-16">
            <div class="sm:col-span-2 grid grid-cols-1 px-4 gap-y-8">
                <div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-5">
                        <div class="flex items-center text-gray-400">
                            <svg class="w-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
                            <p>{{ $opportunity->organization->name }}</p>
                        </div>

                        <div class="flex items-center text-gray-400">
                            <svg class="w-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                            <p>{{ $opportunity->category->name }}</p>
                        </div>

                        <div class="flex items-center text-gray-400">
                            <svg class="w-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <p>
                                @foreach($opportunity->education as $education)
                                    {{ $education->name.($loop->iteration == count($opportunity->education) ? '' : ',') }}
                                @endforeach
                            </p>
                        </div>

                        <div class="flex items-center text-gray-400">
                            <svg class="w-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <p>{{ $opportunity->fund->name }}</p>
                        </div>

                        <div class="flex items-center text-gray-400">
                            <svg class="w-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <p>
                                @foreach($opportunity->locations as $location)
                                    {{ $location->name.($loop->iteration == count($opportunity->locations) ? '' : ',') }}
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <br><br>
                    <div>
                        {!! $opportunity->description !!}
                    </div>
                </div>
            </div>
            <aside id="related_content" class="flex flex-col gap-y-4 my-10">
                <h1 class="text-xl uppercase font-bold pb-4 border-b border-gray-500 inline">Related Opportunities</h1>
                @foreach($related_opps as $related_opp)
                    <div>
                        <x-site.horizontal-card :opportunity="$related_opp" />
                    </div>
                @endforeach
            </aside>
        </div>
    </section>
@endsection
