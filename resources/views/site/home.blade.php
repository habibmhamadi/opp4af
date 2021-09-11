@extends('layouts.site.app')

@section('head')
    <title>Opp4af - Browse Latest Opportunities for Afghanistan</title>
    <meta name="title" content="Opp4af - Browse Latest Opportunities for Afghanistan">
    <meta name="description" content="Opp4af is about exploring latest opportunities containing scholarships, internships, jobs, workshops, fellowships, competitions, courses, online events and more.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="OPP4AF - Explore Latest Oppurtunities for Afghanistan">
    <meta property="og:url" content="https://www.opp4af.com">
    <meta property="og:site_name" content="Opportunity for Afghans">
    <meta property="og:image" content="{{asset('img/preview.jpg')}}">
@endsection

@section('content')
    <section id="search_bar" class="w-full" style="background-image: url('{{ asset('img/cover.png') }}');">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <!-- hero headline -->
            <div class="hero-headline flex flex-col items-center justify-center pt-24 text-center">
                <h1 class=" font-bold text-4xl">{{__('Browse latest opportunities')}}</h1>
                <p class=" font-base text-base text-gray-600">{{__('high quality opportunities shared by our community.')}}</p>
            </div>

            <!-- image search box -->
            <div class="box pt-6 pb-24">
                <div class="box-wrapper">
                    <form onsubmit="sumbitSearch()" class="bg-white rounded flex shadow-sm items-center w-full p-3 shadow-sm border border-gray-200">
                        <button class="outline-none focus:outline-none"><svg class=" w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
                        <input type="search" name="query" id="query" placeholder="{{__('Search for Opportunities')}}" class="w-full border-none pl-4 focus:ring-0 text-sm  bg-transparent">
                        <div class="select">
                            <select id="category" name="search" class="text-sm outline-none border-none focus:outline-none focus:ring-0 bg-transparent">
                                <option value="" selected>{{__('All')}}</option>
                                <option value="1">{{ __('Scholarship') }}</option>
                                <option value="2">{{ __('Job') }}</option>
                                <option value="3">{{ __('Miscellaneous') }}</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <section id="categories" class="hidden md:flex justify-center px-24 py-16 gap-x-24 gap-y-8 text-gray-500">
        <a href="{{ route('opportunities') }}?category_id=1" class="flex flex-col items-center hover:text-blue-500">
            <svg class="w-14 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
            <h1>Scholarships</h1>
        </a>

        <a href="{{ route('opportunities') }}?category_id=2" class="flex flex-col items-center hover:text-blue-500">
            <svg class="w-14 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            <h1>Jobs</h1>
        </a>

        <a href="{{ route('opportunities') }}?category_id=3" class="flex flex-col items-center hover:text-blue-500">
            <svg class="w-14 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
            <h1>Miscellaneous</h1>
        </a>

    </section>

    <section id="top_opportunities" class="grid grid-cols-1 md:grid-cols-3 gap-8 sm:px-24 px-4 pt-16 md:pt-0">
        @foreach($scholarships as $opportunity)
            <x-site.vertical-card :opportunity="$opportunity"/>
        @endforeach
    </section>

    <section id="about_to_close_opportunities" class="sm:px-24 px-4 py-16 my-16 w-full bg-gray-50">
        <h1 class="text-2xl uppercase font-bold pb-4 border-b border-gray-500 inline">Deadline Approach</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 mt-16 gap-5">
            @foreach($deadlines as $opportunity)
                <x-site.horizontal-card :opportunity="$opportunity" />
            @endforeach
        </div>
    </section>

    <section id="ads_placement" class="grid grid-cols-1 md:grid-cols-2 bg-white px-24 gap-5">
        <h1 class="text-xl"></h1>
        <h1 class="text-xl"></h1>
    </section>

    <section id="latest_opportunities" class="sm:px-24 px-4 py-16 my-16 w-full bg-gray-50">
        <h1 class="text-2xl uppercase font-bold pb-4 border-b border-gray-500 inline">Latest Addition</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 mt-16 gap-5">
            @foreach($latests as $latest)
                <x-site.horizontal-card :opportunity="$opportunity" />
            @endforeach
        </div>
    </section>

    <section id="keep_connected" class="grid grid-cols-1 sm:grid-cols-3 px-12 sm:px-24 py-4 pb-16 bg-white gap-16">
        <div>
            <h1 class="text-2xl uppercase font-bold pb-4 border-b border-gray-500 inline">Subscribe!</h1>
            <p class="mt-10 mb-4">Get week's most popular opportunities.</p>
            <form action="{{route('subscriber.store')}}" method="POST">
                @csrf
                <x-input id="email" placeholder="Your email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                @error('email') <div class="emailmsg my-1 text-red-500">{{ $message }}</div> @enderror
                @if(session('success'))
                    <div class="emailmsg my-1 text-green-500">{{ session('success') }}</div>
                @endif
                <x-button class="mt-3" >
                    {{ __('Subscribe') }}
                </x-button>
            </form>
        </div>

        <div>
            <h1 class="text-2xl uppercase font-bold pb-4 border-b border-gray-500 inline">{{__('Connect With Us!')}}</h1>
            <p class="mt-10 mb-4">{{__('Download our Android App.')}}</p>
            <a href="https://play.google.com/store/apps/details?id=com.ofa">
                <img class="rounded w-3/4" loading="lazy" src="{{asset('img/app.png')}}" alt="Opportunity for Afghans - Android App">
            </a>
        </div>

        <div>
            <h1 class="text-2xl uppercase font-bold pb-4 border-b border-gray-500 inline">{{__('Keep connected!')}}</h1>
            <p class="mt-10 mb-4">{{__('Follow us on social medias.')}}</p>
            <div class="flex gap-4">
                <a href="https://www.facebook.com/opportunity4Af" target="_blank">
                    <img class="w-10" src="{{asset('img/facebook.png')}}" alt="Opportunity for Afghans - Facebook">
                </a>
                <a href="https://www.instagram.com/opportunity4af" target="_blank">
                    <img class="w-10" src="{{asset('img/instagram.png')}}" alt="Opportunity for Afghans - Instagram">
                </a>
                <a href="https://t.me/Opportunity4Af" target="_blank">
                    <img class="w-10" src="{{asset('img/telegram.png')}}" alt="Opportunity for Afghans - Telegram">
                </a>
                <a href="https://twitter.com/opportunity4af" target="_blank">
                    <img class="w-10" src="{{asset('img/twitter.png')}}" alt="Opportunity for Afghans - Twitter">
                </a>
            </div>
        </div>

    </section>
@endsection

@section('script')
    <script>
        function sumbitSearch() {
            event.preventDefault()
            var query = document.getElementById('query').value
            var category = document.getElementById('category').value
            var ref = '?'
            if(query) {
                ref += 'query='+query+'&'
            }
            if(category){
                ref += 'category_id='+category
            }
            if(ref.charAt(ref.length-1) === '&') {
                ref = ref.substring(0, ref.length-1)
            }
            window.location.href = '{{ route('opportunities') }}' + ref
        }

        document.addEventListener('DOMContentLoaded', ()=>{
            if(document.querySelector('.emailmsg')) {
                document.getElementById('email').scrollIntoView()
            }
        })
    </script>
@endsection
