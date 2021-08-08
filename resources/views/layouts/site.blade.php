<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="font-sans antialiased bg-white">
<div x-data="{open : false}" class="relative bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a href="#">
                    <span class="sr-only">Workflow</span>
                    <h1>LOGO</h1>
                </a>
            </div>
            <div class="-mr-2 -my-2 md:hidden">
                <button @click="open = true" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <nav class="hidden md:flex space-x-10">
                <div class="relative">
                    <button @click="open = true" @click.away="open = false" type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
                        <span>Solutions</span>
                        <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
                        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                            <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">

                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">
                                            Analytics
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Get a better understanding of where your traffic is coming from.
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                    Pricing
                </a>

                <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                    Pricing
                </a>
            </nav>
        </div>
    </div>
    <div x-show="open" class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
            <div class="pt-5 pb-6 px-5">
                <div class="flex items-center justify-between">
                    <div>
                        LOGO
                    </div>
                    <div class="-mr-2">
                        <button @click="open = false" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-6">
                    <nav class="grid gap-y-8">

                        <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                            <!-- Heroicon name: outline/chart-bar -->
                            <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <span class="ml-3 text-base font-medium text-gray-900">
                Analytics
              </span>
                        </a>
                    </nav>
                </div>
            </div>
            <div class="py-6 px-5 space-y-6">
                <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                    <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                        Pricing
                    </a>

                    <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                        Docs
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>

<main>
    <div class="w-full" style="background-image: url('{{ asset('img/cover.png') }}');">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <!-- hero headline -->
            <div class="hero-headline flex flex-col items-center justify-center pt-24 text-center">
                <h1 class=" font-bold text-4xl">Browse latest opportunities</h1>
                <p class=" font-base text-base text-gray-600">high quality opportunities shared by our community.</p>
            </div>

            <!-- image search box -->
            <div class="box pt-6 pb-24">
                <div class="box-wrapper">
                    <div class="bg-white rounded flex shadow-sm items-center w-full p-3 shadow-sm border border-gray-200">
                        <button class="outline-none focus:outline-none"><svg class=" w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
                        <input type="search" name="" id="" placeholder="Search for Opportunities" class="w-full border-none pl-4 focus:ring-0 text-sm  bg-transparent">
                        <div class="select">
                            <select name="" id=""  class="text-sm outline-none border-none focus:outline-none focus:ring-0 bg-transparent">
                                <option value="all" selected>All</option>
                                <option value="photo">Photo</option>
                                <option value="illustration">Illustration</option>
                                <option value="vector">Vector</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>

    <div class="hidden md:grid grid-cols-4 lg:grid-cols-7 px-24 py-16 gap-x-16 gap-y-8 text-gray-500">
        <a href="" class="flex flex-col items-center hover:text-blue-500">
            <svg class="w-14 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
            <h4>Scholarships</h4>
        </a>

        <a href="" class="flex flex-col items-center hover:text-blue-500">
            <svg class="w-14 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            <h4>Jobs</h4>
        </a>

        <a href="" class="flex flex-col items-center hover:text-blue-500">
            <svg class="w-14 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            <h4>Workshops</h4>
        </a>

        <a href="" class="flex flex-col items-center hover:text-blue-500">
            <svg class="w-14 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            <h4>Internships</h4>
        </a>

        <a href="" class="flex flex-col items-center hover:text-blue-500">
            <svg class="w-14 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
            <h4>Fellowships</h4>
        </a>

        <a href="" class="flex flex-col items-center hover:text-blue-500">
            <svg class="w-14 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <h4>Courses</h4>
        </a>

        <a href="" class="flex flex-col items-center hover:text-blue-500">
            <svg class="w-14 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
            <h4>Miscellaneous</h4>
        </a>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 sm:px-24 px-4 pt-16 md:pt-0">
        <div class="rounded shadow flex flex-col gap-2 pb-1">
            <img class="bg-cover h-52" src="{{asset('img/cover.png')}}" alt="">
            <div class="flex flex-col gap-2 px-2">
                <div class="flex items-center text-gray-400">
                    <svg class="w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                    <p class="text-sm">Scholarship</p>
                </div>
                <a href="" class="text-xl hover:text-blue-500">
                    <h1>Deakin University Scholarships 2021-2022 (Fully Funded)</h1>
                </a>
                <div class="flex gap-x-2 text-gray-500 text-sm font-semibold">
                    <h4>Australia</h4>
                    <span>|</span>
                    <p>Fully Funded</p>
                </div>
            </div>
        </div>
    </div>

    <div class="sm:px-24 px-4 py-16 my-16 w-full bg-gray-50">
        <h1 class="text-2xl uppercase font-bold pb-4 border-b border-gray-500 inline">Deadline Approach</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 mt-16 gap-5">
            <div class="bg-white rounded shadow flex flex-col p-3 gap-y-5">
                <div class="flex gap-x-4 items-center">
                    <img class="w-16 h-16 bg-cover rounded" src="{{asset('img/cover.png')}}" alt="">
                    <a href="" class="hover:text-blue-500">
                        <h1 class="overflow-hidden overflow-ellipsis text-lg" style="-webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical;">Deakin University Scholarships 2021-2022 (Fully Funded) Deakin University Scholarships 2021-2022 (Fully Funded) </h1>
                    </a>
                </div>
                <div class="flex justify-between text-gray-500">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                        <h6 class="text-sm">Scholarship</h6>
                    </div>
                    <h6 class="text-sm">1 week</h6>
                </div>
            </div>
            <div class="bg-white rounded shadow flex flex-col p-3 gap-y-5">
                <div class="flex gap-x-4 items-center">
                    <img class="w-16 h-16 bg-cover rounded" src="{{asset('img/cover.png')}}" alt="">
                    <a href="" class="hover:text-blue-500">
                        <h1 class="overflow-hidden overflow-ellipsis text-lg" style="-webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical;">Deakin University Scholarships 2021-2022 (Fully Funded) Deakin University Scholarships 2021-2022 (Fully Funded) </h1>
                    </a>
                </div>
                <div class="flex justify-between text-gray-500">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                        <h6 class="text-sm">Scholarship</h6>
                    </div>
                    <h6 class="text-sm">1 week</h6>
                </div>
            </div>
            <div class="bg-white rounded shadow flex flex-col p-3 gap-y-5">
                <div class="flex gap-x-4 items-center">
                    <img class="w-16 h-16 bg-cover rounded" src="{{asset('img/cover.png')}}" alt="">
                    <a href="" class="hover:text-blue-500">
                        <h1 class="overflow-hidden overflow-ellipsis text-lg" style="-webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical;">Deakin University Scholarships 2021-2022 (Fully Funded) Deakin University Scholarships 2021-2022 (Fully Funded) </h1>
                    </a>
                </div>
                <div class="flex justify-between text-gray-500">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                        <h6 class="text-sm">Scholarship</h6>
                    </div>
                    <h6 class="text-sm">1 week</h6>
                </div>
            </div>
            <div class="bg-white rounded shadow flex flex-col p-3 gap-y-5">
                <div class="flex gap-x-4 items-center">
                    <img class="w-16 h-16 bg-cover rounded" src="{{asset('img/cover.png')}}" alt="">
                    <a href="" class="hover:text-blue-500">
                        <h1 class="overflow-hidden overflow-ellipsis text-lg" style="-webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical;">Deakin University Scholarships 2021-2022 (Fully Funded) Deakin University Scholarships 2021-2022 (Fully Funded) </h1>
                    </a>
                </div>
                <div class="flex justify-between text-gray-500">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                        <h6 class="text-sm">Scholarship</h6>
                    </div>
                    <h6 class="text-sm">1 week</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 bg-white px-24 gap-5">
        <h1 class="text-xl">Ads 1</h1>
        <h1 class="text-xl">Ads 2</h1>
    </div>
    <div class="sm:px-24 px-4 py-16 my-16 w-full bg-gray-50">
        <h1 class="text-2xl uppercase font-bold pb-4 border-b border-gray-500 inline">Latest Addition</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 mt-16 gap-5">
            <div class="bg-white rounded shadow flex flex-col p-3 gap-y-5">
                <div class="flex gap-x-4 items-center">
                    <img class="w-16 h-16 bg-cover rounded" src="{{asset('img/cover.png')}}" alt="">
                    <a href="" class="hover:text-blue-500">
                        <h1 class="overflow-hidden overflow-ellipsis text-lg" style="-webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical;">Deakin University Scholarships 2021-2022 (Fully Funded) Deakin University Scholarships 2021-2022 (Fully Funded) </h1>
                    </a>
                </div>
                <div class="flex justify-between text-gray-500">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                        <h6 class="text-sm">Scholarship</h6>
                    </div>
                    <h6 class="text-sm">1 week</h6>
                </div>
            </div>
            <div class="bg-white rounded shadow flex flex-col p-3 gap-y-5">
                <div class="flex gap-x-4 items-center">
                    <img class="w-16 h-16 bg-cover rounded" src="{{asset('img/cover.png')}}" alt="">
                    <a href="" class="hover:text-blue-500">
                        <h1 class="overflow-hidden overflow-ellipsis text-lg" style="-webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical;">Deakin University Scholarships 2021-2022 (Fully Funded) Deakin University Scholarships 2021-2022 (Fully Funded) </h1>
                    </a>
                </div>
                <div class="flex justify-between text-gray-500">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                        <h6 class="text-sm">Scholarship</h6>
                    </div>
                    <h6 class="text-sm">1 week</h6>
                </div>
            </div>
            <div class="bg-white rounded shadow flex flex-col p-3 gap-y-5">
                <div class="flex gap-x-4 items-center">
                    <img class="w-16 h-16 bg-cover rounded" src="{{asset('img/cover.png')}}" alt="">
                    <a href="" class="hover:text-blue-500">
                        <h1 class="overflow-hidden overflow-ellipsis text-lg" style="-webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical;">Deakin University Scholarships 2021-2022 (Fully Funded) Deakin University Scholarships 2021-2022 (Fully Funded) </h1>
                    </a>
                </div>
                <div class="flex justify-between text-gray-500">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                        <h6 class="text-sm">Scholarship</h6>
                    </div>
                    <h6 class="text-sm">1 week</h6>
                </div>
            </div>
            <div class="bg-white rounded shadow flex flex-col p-3 gap-y-5">
                <div class="flex gap-x-4 items-center">
                    <img class="w-16 h-16 bg-cover rounded" src="{{asset('img/cover.png')}}" alt="">
                    <a href="" class="hover:text-blue-500">
                        <h1 class="overflow-hidden overflow-ellipsis text-lg" style="-webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical;">Deakin University Scholarships 2021-2022 (Fully Funded) Deakin University Scholarships 2021-2022 (Fully Funded) </h1>
                    </a>
                </div>
                <div class="flex justify-between text-gray-500">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                        <h6 class="text-sm">Scholarship</h6>
                    </div>
                    <h6 class="text-sm">1 week</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 px-12 sm:px-24 py-4 pb-16 bg-white gap-16">
        <div>
            <h1 class="text-2xl uppercase font-bold pb-4 border-b border-gray-500 inline">Subscribe!</h1>
            <p class="mt-10 mb-4">Get week's most popular opportunities.</p>
            <form action="">
                <x-input id="email" placeholder="Your email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                @error('email') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                <x-button class="mt-3" >
                    {{ __('Subscribe') }}
                </x-button>
            </form>
        </div>

        <div>
            <h1 class="text-2xl uppercase font-bold pb-4 border-b border-gray-500 inline">Connect With Us!</h1>
            <p class="mt-10 mb-4">Download our Android App.</p>
            <a href="">
                <img class="rounded w-3/4" src="{{asset('img/app.png')}}" alt="">
            </a>
        </div>

        <div>
            <h1 class="text-2xl uppercase font-bold pb-4 border-b border-gray-500 inline">Keep connected!</h1>
            <p class="mt-10 mb-4">Follow us on social medias.</p>
            <div class="flex gap-4">
                <a href="">
                    <img class="w-10" src="{{asset('img/facebook.png')}}" alt="">
                </a>
                <a href="">
                    <img class="w-10" src="{{asset('img/instagram.png')}}" alt="">
                </a>
                <a href="">
                    <img class="w-10" src="{{asset('img/telegram.png')}}" alt="">
                </a>
                <a href="">
                    <img class="w-10" src="{{asset('img/twitter.png')}}" alt="">
                </a>
            </div>
        </div>

    </div>

</main>

<footer class="bg-gray-50 sm:px-64 px-12 pt-16 pb-5 gap-12">
    <div class="grid grid-cols-1 sm:grid-cols-3 pb-4 gap-y-4">
        <div class="flex flex-col gap-y-1">
            <h1 class="uppercase text-xl font-semibold mb-4">Opportunity for Afghans</h1>
            <p>Opportunity for Afghans is one of the largest oppurtunity discovery platforms for youth across Afghanistan.</p>
        </div>
        <div></div>
        <div class="flex uppercase flex-col gap-y-1">
            <h1 class=" text-xl font-semibold mb-4">Links</h1>
            <a href="" class="hover:text-blue-500">Home</a>
            <a href="" class="hover:text-blue-500">Downloads</a>
            <a href="" class="hover:text-blue-500">About us</a>
            <a href="" class="hover:text-blue-500">Privacy Policy</a>
        </div>
    </div>
    <hr>
    <p class="text-center py-8">&copy; Copyright 2021 <strong>Opp4af.</strong> All rights reserved.</p>
</footer>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
