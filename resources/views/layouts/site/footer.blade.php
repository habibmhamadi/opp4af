<footer class="w-full bg-gray-50 px-4 pt-16 pb-5 gap-12">
    <div class="max-w-4xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-3 pb-4 gap-y-4">
            <div class="flex flex-col gap-y-1">
                <div class="flex gap-x-2">
                    <img loading="lazy" src="{{asset('icons/opp4af-logo.png')}}" class="w-9 h-9" alt="Opp4af - Opportunity for Afghans">
                    <h1 class="uppercase text-xl font-semibold mb-4">Opportunity for Afghans</h1>
                </div>
                <p>{{ __('Opportunity for Afghans is one of the largest oppurtunity discovery platforms for youth across Afghanistan.') }}</p>
            </div>
            <div></div>
            <div class="flex uppercase flex-col gap-y-1">
                <h1 class=" text-xl font-semibold mb-4">{{__('Useful Links')}}</h1>
                <ul>
                    <li><a href="{{ route('home') }}" class="hover:text-blue-500">{{__('Home')}}</a></li>
                    <li><a href="{{ route('opportunities') }}" class="hover:text-blue-500">{{__('Opportunities')}}</a></li>
                    <li><a href="{{route('posts')}}" class="hover:text-blue-500">{{__('Blog')}}</a></li>
                    <li><a href="{{route('about')}}" class="hover:text-blue-500">{{__('About us')}}</a></li>
                    <li><a href="{{route('policy')}}" class="hover:text-blue-500">{{__('Privacy Policy')}}</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="text-center py-8">&copy; Copyright {{ date("Y") }} <strong>Opp4af.</strong> All rights reserved.</p>
    </div>
</footer>
