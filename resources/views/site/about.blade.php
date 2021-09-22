@extends('layouts.site.app')

@section('head')
    <title>About - Opportunity for Afghans</title>
    <meta name="title" content="About - Opportunity for Afghans">
    <meta name="description" content="Opportunity for Afghans is a trustworthy source of educations, jobs, fellowships, conferences etc. Moreover, for the ease of use Opp4af is accessible both by a computer and as well as mobile phone.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="About - Opportunity for Afghans">
    <meta property="og:url" content="{{route('about')}}">
    <meta property="og:site_name" content="Opportunity for Afghans">
    <meta name="og:description" content="Opportunity for Afghans is a trustworthy source of educations, jobs, fellowships, conferences etc. Moreover, for the ease of use Opp4af is accessible both by a computer and as well as mobile phone.">
    <meta property="og:image" content="{{asset('img/preview.jpg')}}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="About - Opportunity for Afghans">
    <meta name="twitter:image" content="{{asset('img/preview.jpg')}}">
    <meta name="twitter:description" content="Opportunity for Afghans is a trustworthy source of educations, jobs, fellowships, conferences etc. Moreover, for the ease of use Opp4af is accessible both by a computer and as well as mobile phone.">
@endsection

@section('content')

    <section id="about_cover" class="w-full" style="background-image: url('{{ asset('img/cover.png') }}');">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <!-- hero headline -->
            <div class="hero-headline flex flex-col items-center justify-center py-24 text-center">
                <h1 class=" font-bold text-4xl">{{__('Opportunity for Afghans | About')}}</h1>
            </div>
        </div>
    </section>

    <section id="about" class="py-10 max-w-3xl mx-auto px-4 md:px-0">
        <p>{{__('Opportunity for Afghans is a trustworthy source of educations, jobs, fellowships, conferences etc. Moreover, for the ease of use Opp4af is accessible both by a computer and as well as mobile phone. As Afghanistan is a developing country with limited resources and opportunities for its youth who does not only represent the majority of the country’s population but are those who should be invested in. By upskilling the young population, their potential can be used in the future for the development of the country. To tackle this challenge, we came up with the idea of developing a mobile application and as well as a website which informs Afghans from internal and external opportunities in an instantaneous way. Our team always strives to provide Afghans the most suitable and beneficial opportunities as rapidly as possible, and thereby fulfil our share of capacity building of the youth. ')}}</p>

        <h1 class="text-xl font-bold sm:text-center mt-12 mb-10">{{__('What we do?')}}</h1>
        <p>{{__('As an Opportunity provider platform, Opportunity for Afghans provide easy and instantaneous access to unlimited opportunities to millions of Afghans free of cost, and with no hustle of registration. Opp4Af thrives on promoting youth development by delivering capacity building materials and opportunities. The purpose is to make every opportunity easily accessible to every Afghan. Opp4Af.com works relentlessly to create an efficacious bridge between Afghan opportunity seekers with opportunity providers for mutually beneficial development through sharing of information.')}}</p>
        <h1 class="text-xl font-bold sm:text-center mt-12 mb-10">{{__('Why we do?')}}</h1>
        <p>{{__('Opportunity for Afghans believes that ‘Access to Information’ is not a privilege rather a basic right. Despite praiseworthy development of Information Communication Technology, there exists acute deficiency in awareness level among youth about different opportunities pertaining to youth development. As a result, thousands of youth are missing out important chances for self-development in form of education, international exposure, training, and employment. Opp4Af.com thus, is working to build local awareness by sharing opportunities to ensure free and equal access. ')}}</p>
        <h1 class="text-xl font-bold sm:text-center mt-12 mb-10">{{__('How you can help?')}}</h1>
        <p>{{__('The core of Opportunity for Afghans is young people like you: enthusiastic, responsible and active citizens who understands the importance of ‘Access to Information’ for self-development and appreciate our endeavor in this regard. Opportunity for Afghans is grateful to you and requests to join its journey for change. Support Opportunity for Afghans by sharing us in your personal, social and professional networks!')}}</p>

        <h1 class="text-2xl font-bold uppercase sm:text-center mt-16 mb-10">{{__('Contact us')}}</h1>
        <div class="flex gap-4 justify-center">
            <a href="https://www.facebook.com/opportunity4Af" target="_blank">
                <img loading="lazy" class="w-10" src="{{asset('img/facebook.png')}}" alt="Opportunity for Afghans - Facebook">
            </a>
            <a href="https://www.instagram.com/opportunity4af" target="_blank">
                <img loading="lazy" class="w-10" src="{{asset('img/instagram.png')}}" alt="Opportunity for Afghans - Instagram">
            </a>
            <a href="https://t.me/Opportunity4Af" target="_blank">
                <img loading="lazy" class="w-10" src="{{asset('img/telegram.png')}}" alt="Opportunity for Afghans - Telegram">
            </a>
            <a href="https://twitter.com/opportunity4af" target="_blank">
                <img loading="lazy" class="w-10" src="{{asset('img/twitter.png')}}" alt="Opportunity for Afghans - Twitter">
            </a>
        </div>
    </section>

@endsection
