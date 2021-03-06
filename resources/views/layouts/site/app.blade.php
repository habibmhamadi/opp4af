<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('head')
    @include('layouts.site.favicon')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')

</head>
<body class="font-sans antialiased bg-white">
   @if(config('app.analytics_id'))
       @once
           <!-- Global site tag (gtag.js) - Google Analytics -->
           <script async src="https://www.googletagmanager.com/gtag/js?id={{config('app.analytics_id')}}"></script>
           <script>
               window.dataLayer = window.dataLayer || [];
               function gtag(){dataLayer.push(arguments);}
               gtag('js', new Date());

               gtag('config', '{{config('app.analytics_id')}}', {
                   cookie_flags: 'SameSite=None;Secure',
               });
           </script>
       @endonce
   @endif
   @include('layouts.site.navigation')

<main>
  @yield('content')

</main>

@include('layouts.site.footer')
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
@yield('script')
</body>
</html>
