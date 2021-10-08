<header x-data="{open : false}" class="relative bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center py-5 md:justify-start md:space-x-10">
            <div class="flex justify-start flex-1">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{asset('icons/opp4af-logo.png')}}" class="w-8" alt="Opp4af - Opportunity for Afghans">
                    <h1 class="ml-2 font-semibold text-xl">Opportunity for Afghans</h1>
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
            <nav class="hidden md:flex">
                <ul class="flex space-x-10">
                    <li>
                        <a href="{{ route('home') }}" class="text-base font-medium text-gray-500 hover:text-gray-900 {{ request()->routeIs('home') ? 'text-gray-900' : '' }}">
                            {{ __('Home') }}
                        </a>
                    </li>
                    <li>
                        <div class="relative">
                            <button @click="open = true" @click.away="open = false" type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ request()->routeIs('opportunities') ? 'text-gray-900' : '' }}" aria-expanded="false">
                                <span>{{ __('Opportunities') }}</span>
                                <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <div x-show="open" class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
                                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                    <ul class="relative grid gap-2 bg-white p-4">
                                        <li>
                                            <a href="{{ route('opportunities') }}?category_id=1" class="flex gap-x-2 text-gray-600 hover:bg-blue-50 px-1 py-2 rounded">
                                                <svg class="w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                                                <p>{{ __('Scholarship') }}</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('opportunities') }}?category_id=2" class="flex gap-x-2 text-gray-600 hover:bg-blue-50 px-1 py-2 rounded">
                                                <svg class="w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                                <p>{{ __('Job') }}</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('opportunities') }}?category_id=3" class="flex gap-x-2 text-gray-600 hover:bg-blue-50 px-1 py-2 rounded">
                                                <svg class="w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                                                <p>{{ __('Miscellaneous') }}</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{route('posts')}}" class="text-base font-medium text-gray-500 hover:text-gray-900 {{ request()->routeIs('posts') ? 'text-gray-900' : '' }}">
                            {{ __('Blog') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('about')}}" class="text-base font-medium text-gray-500 hover:text-gray-900 {{ request()->routeIs('about') ? 'text-gray-900' : '' }}">
                            {{ __('About') }}
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div x-show="open" class="absolute top-0 inset-x-0 p-2 z-10 transition transform origin-top-right md:hidden">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
            <div class="pt-5 pb-6 px-5">
                <div class="flex items-center justify-between">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{asset('icons/opp4af-logo.png')}}" class="w-8" alt="Opp4af - Opportunity for Afghans">
                        <h1 class="ml-2 font-semibold text-xl">Opportunity for Afghans</h1>
                    </a>
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
                    <nav>
                        <ul class="grid gap-y-5">
                            <li>
                                <a href="{{route('home')}}" class="-m-3 p-3 flex hover:bg-blue-50 items-center rounded-md {{ request()->routeIs('home') ? 'bg-blue-50' : '' }}">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{route('posts')}}" class="-m-3 p-3 flex hover:bg-blue-50 items-center rounded-md {{ request()->routeIs('posts') ? 'bg-blue-50' : '' }}">
                                    {{ __('Blog') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{route('about')}}" class="-m-3 p-3 flex hover:bg-blue-50 items-center rounded-md {{ request()->routeIs('about') ? 'bg-blue-50' : '' }}">
                                    {{ __('About') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{route('policy')}}" class="-m-3 p-3 flex hover:bg-blue-50 items-center rounded-md {{ request()->routeIs('policy') ? 'bg-blue-50' : '' }}">
                                    {{ __('Privacy Policy') }}
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="space-y-6 px-3 py-4">
                <ul class="grid grid-cols-2 gap-y-4 gap-x-8 text-gray-600">
                    <li>
                        <a href="{{ route('opportunities') }}?category_id=1" class="text-base flex items-center rounded p-2 flex hover:bg-blue-50 hover:text-gray-700 {{ (request()->routeIs('opportunities') && request()->query('category_id') == 1) ? 'bg-blue-50' : '' }}">
                            <svg class="w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                            {{ __('Scholarship') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('opportunities') }}?category_id=2" class="text-base flex items-center rounded p-2 flex hover:bg-blue-50 hover:text-gray-700 {{ (request()->routeIs('opportunities') && request()->query('category_id') == 2) ? 'bg-blue-50' : '' }}">
                            <svg class="w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            {{ __('Job') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('opportunities') }}?category_id=3" class="text-base flex items-center rounded p-2 flex hover:bg-blue-50 hover:text-gray-700 {{ (request()->routeIs('opportunities') && request()->query('category_id') == 3) ? 'bg-blue-50' : '' }}">
                            <svg class="w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                            {{ __('Miscellaneous') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
