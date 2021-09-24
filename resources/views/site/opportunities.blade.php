@extends('layouts.site.app')

@section('head')
    <title>Search for Opportunities - Opportunity for Afghans</title>
    <meta name="title" content="Search for Opportunities - Opportunity for Afghans">
    <meta name="description" content="Explore latest opportunities for Afghanistan containing scholarships, internships, jobs, workshops, fellowships, competitions, courses, online events and more.">
    <meta property="og:description" content="Explore latest opportunities for Afghanistan containing scholarships, internships, jobs, workshops, fellowships, competitions, courses, online events and more.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Search for Opportunities - Opportunity for Afghans">
    <meta property="og:url" content="{{route('opportunities')}}">
    <meta property="og:site_name" content="Opportunity for Afghans">
    <meta property="og:image" content="{{asset('img/preview.jpg')}}">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Search for Opportunities - Opportunity for Afghans">
    <meta property="twitter:image" content="{{asset('img/preview.jpg')}}">
    <meta property="twitter:description" content="Explore latest opportunities in Afghanistan containing scholarships, internships, jobs, workshops, fellowships, competitions, courses, online events and more.">
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/slim-select.css') }}">
@endsection

@section('content')

    <div class="max-w-6xl mx-auto grid sm:grid-cols-12 grid-cols-1 py-12 px-4">
        <div class="col-span-3 bg-gray-50 p-4">
            <h1 class="text-lg font-bold mb-4">{{__('Advanced Filters')}}</h1>
            <x-label for="category_id" :value="__('Category')" />
            <select onchange="sumbitSearch()" id="category_id" name="category_id" class="my-2 mb-3 w-full border-gray-200 text-gray-500 rounded py-2 outline-none">
                <option value="">{{__('Any')}}</option>
                @foreach($categories as $category)
                    <option {{ ($category->id == $category_id ?? 0) ? 'selected' : '' }} value="{{$category->id}}" class="py-1">{{ $category->name }}</option>
                @endforeach
            </select>

            <x-label for="location_id" :value="__('Location')" />
            <select onchange="sumbitSearch()" id="location_id" name="location_id" class="my-2 mb-3 w-full border-gray-200 text-gray-500 rounded py-2 outline-none">
                <option value="">{{__('Any')}}</option>
                @foreach($locations as $location)
                    <option {{ ($location->id == $location_id ?? 0) ? 'selected' : '' }} value="{{$location->id}}" class="py-1">{{ $location->name }}</option>
                @endforeach
            </select>

            <x-label for="education_ids" :value="__('Education')" />
            <select onchange="sumbitSearch()" id="education_ids" multiple name="education_ids[]" class="mb-3 w-full border-gray-200 text-gray-500 rounded py-2 outline-none">
                <option value="">{{__('Any')}}</option>
                @foreach($education as $edu)
                    <option {{ in_array($edu->id, $education_ids ) ? 'selected' : '' }} value="{{$edu->id}}" class="py-1">{{ $edu->name }}</option>
                @endforeach
            </select>

            <x-label for="area_ids" :value="__('Functional Area')" />
            <select onchange="sumbitSearch()" id="area_ids" multiple name="area_ids[]" class="mb-3 w-full border-gray-200 text-gray-500 rounded py-2 outline-none">
                <option value="">{{__('Any')}}</option>
                @foreach($areas as $area)
                    <option {{ in_array($area->id, $area_ids) ? 'selected' : '' }} value="{{$area->id}}" class="py-1">{{ $area->name }}</option>
                @endforeach
            </select>

            <x-label for="fund_id" :value="__('Fund Type')" />
            <select onchange="sumbitSearch()" id="fund_id" name="fund_id" class="my-2 mb-5 w-full border-gray-200 text-gray-500 rounded py-2 outline-none">
                <option value="">{{__('Any')}}</option>
                @foreach($funds as $fund)
                    <option {{ ($fund->id == $fund_id ?? 0) ? 'selected' : '' }} value="{{$fund->id}}" class="py-1">{{ $fund->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-span-9 mt-10 sm:mt-0 p-2 sm:px-12">
            <form onsubmit="sumbitSearch()" class="flex">
                <input id="searchInput" name="searchInput" type="search" value="{{$query}}" placeholder="Search..." class="w-full sm:w-3/4 border-gray-300 rounded p-2 focus:ring-blue-200">
            </form>
            <section id="opportunities" class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-16 md:pt-0 mt-2 sm:mt-10">
                @if($opportunities->count())
                    @foreach($opportunities as $opportunity)
                        <x-site.horizontal-card :opportunity="$opportunity" />
                        @if($loop->iteration == 1 || $loop->iteration == 5)
                            {{--
                                <section id="ads_placement" class="bg-black">

                            </section>
                            --}}
                        @endif
                    @endforeach
                @else
                    <p>{{__('No match found.')}}</p>
                @endif
            </section>
            <div class="mt-10">
                {{$opportunities->links()}}
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('js/slim-select.js') }}"></script>
    <script>
        new SlimSelect({
            select: '#education_ids'
        })
        new SlimSelect({
            select: '#area_ids'
        })
    </script>
    <script>
        function sumbitSearch() {
            event.preventDefault()
            var query = document.getElementById('searchInput').value
            var category_id = document.getElementById('category_id').value
            var education_ids = document.getElementById('education_ids')
            var fund_id = document.getElementById('fund_id').value
            var location_id = document.getElementById('location_id').value
            var area_ids = document.getElementById('area_ids')
            var url = '{{route('opportunities')}}'
            filters = {}
            if(category_id) filters.category_id = category_id
            if(fund_id) filters.fund_id = fund_id
            if(location_id) filters.location_id = location_id
            if(education_ids) {
                var res = getSelectedValues(education_ids.options)
                if(res) filters.education_ids = res
            }
            if(area_ids) {
                var res = getSelectedValues(area_ids.options)
                if(res) filters.area_ids = res
            }
            if (query) filters.query = query
            if(Object.keys(filters).length) {
                url = url + '?' + param(filters)
            }
            window.location.href = url
        }

        function getSelectedValues(options) {
            var result = []
            for(var i=0; i<options.length; i++){
                if(options[i].selected && !options[i].value){
                    result = []
                    break
                }
                else if (options[i].selected) {
                    result.push(options[i].value)
                }
            }
            return result.length ? result : false
        }

        function param(object)
        {
            var parameters = [];
            for (var property in object) {
                parameters.push(encodeURI(property + '=' + object[property]));
            }
            return parameters.join('&');
        }

        document.addEventListener('DOMContentLoaded', () => {
            const params = new URLSearchParams(window.location.search)
            var url = '{{route('opportunities')}}'
            var next = document.querySelector('[rel="next"]')
            var prev = document.querySelector('[rel="prev"]')
            if(next) {
                const param = new URL(next.href).searchParams
                params.set('page', param.get('page'))
                var ref = url + '?'
                params.forEach((v, k) => {
                    ref += k+'='+v+'&'
                })
                next.href = ref.substring(0, ref.length-1)
            }
            if(prev) {
                const param = new URL(prev.href).searchParams
                params.set('page', param.get('page'))
                var ref = url + '?'
                params.forEach((v, k) => {
                    ref += k+'='+v+'&'
                })
                prev.href = ref.substring(0, ref.length-1)
            }
        })
    </script>
@endsection
