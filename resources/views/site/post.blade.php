@extends('layouts.site.app')

@section('head')
    <title>{{$post->name}} - Opportunity for Afghans</title>
    <meta name="title" content="{{$post->name}} - Opportunity for Afghans">
    <meta name="description" content="{{$post->short_description}}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{$post->name}} - Opportunity for Afghans">
    <meta property="og:url" content="{{ route('post', $post->slug)}}">
    <meta property="og:site_name" content="Opportunity for Afghans">
    <meta property="og:image" content="{{$post->getImageUrl()}}">
    <meta property="og:description" content="{{$post->short_description}}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{$post->name}} - Opportunity for Afghans">
    <meta name="twitter:image" content="{{$post->getImageUrl()}}">
    <meta name="twitter:description" content="{{$post->short_description}}">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4301168084246613"
            crossorigin="anonymous"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/desc.css') }}">
@endsection

@section('content')
    <section class="px-4">
        <div class="max-w-4xl mx-auto py-32 md:py-52 lg:py-60 mt-8 bg-cover" style="background-image: url('{{ $post->getImageUrl() }}');">
        </div>
        <article class="max-w-4xl mx-auto mb-8">
            <h1 class="text-4xl font-bold my-10">{{$post->name}}</h1>
            <p class="text-gray-500 text-sm mb-4">{{$post->created_at->diffForHumans()}}</p>
            <div class="desc">{!! $post->description !!}</div>
        </article>
    </section>
    <section class="max-w-4xl mx-auto my-16 px-4">
        <h1 class="text-center text-2xl border-b border-gray-300 uppercase text-gray-900 py-8 my-8 font-semibold">{{__('Trending Posts')}}</h1>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-x-4">
            @foreach($trending_posts as $trending)
                <x-site.post-card :post="$trending" />
            @endforeach
        </div>
    </section>
    {{--
     <section id="ads_placement" class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 bg-black my-16 px-4 gap-5">
     </section>
     --}}

@endsection
