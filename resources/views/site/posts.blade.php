@extends('layouts.site.app')

@section('head')
    <title>Blog Posts - Opportunity for Afghans</title>
    <meta name="title" content="Blog Posts - Opportunity for Afghans">
    <meta name="description" content="Explore latest opportunities for Afghanistan containing scholarships, internships, jobs, workshops, fellowships, competitions, courses, online events and more.">
    <meta property="og:description" content="Explore latest opportunities for Afghanistan containing scholarships, internships, jobs, workshops, fellowships, competitions, courses, online events and more.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Blog Posts - Opportunity for Afghans">
    <meta property="og:url" content="{{route('posts')}}">
    <meta property="og:site_name" content="Opportunity for Afghans">
    <meta property="og:image" content="{{asset('img/preview.jpg')}}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Blog Posts - Opportunity for Afghans">
    <meta name="twitter:image" content="{{asset('img/preview.jpg')}}">
    <meta name="twitter:description" content="Explore latest opportunities in Afghanistan containing scholarships, internships, jobs, workshops, fellowships, competitions, courses, online events and more.">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4301168084246613"
            crossorigin="anonymous"></script>
@endsection

@section('content')

    <form action="" onsubmit="event.preventDefault(); sumbitSearch()" class="max-w-xl mx-auto px-4 mt-10 mb-6">
        <input id="query" name="query" value="{{$query}}" class="rounded border-gray-300 w-full mb-3" type="search" placeholder="{{__('Search...')}}">
    </form>

        <div class="max-w-6xl mx-auto grid md:grid-cols-2 lg:grid-cols-3 grid-cols-1 px-5 sm:px-20 lg:px-14 py-8 gap-y-5 gap-x-8">
            @foreach($posts as $post)
                <x-site.post-card :post="$post" />
            @endforeach
        </div>
    <div class="max-w-3xl mx-auto px-5 pb-5">
        {{ $posts->links() }}
    </div>

@endsection

@section('script')
    <script>
        function sumbitSearch() {
            var query = document.getElementById('query')
            var url = '{{route('posts')}}'
            if(query.value !=  '') {
                console.log(query)
                url += '?query='+query.value
            }
            location.replace(url)
        }
    </script>
@endsection
