<footer class="bg-gray-50 sm:px-64 px-12 pt-16 pb-5 gap-12">
    <div class="grid grid-cols-1 sm:grid-cols-3 pb-4 gap-y-4">
        <div class="flex flex-col gap-y-1">
            <h1 class="uppercase text-xl font-semibold mb-4">Opportunity for Afghans</h1>
            <p>{{ __('Opportunity for Afghans is one of the largest oppurtunity discovery platforms for youth across Afghanistan.') }}</p>
        </div>
        <div></div>
        <div class="flex uppercase flex-col gap-y-1">
            <h1 class=" text-xl font-semibold mb-4">{{__('Links')}}</h1>
            <ul>
                <li><a href="{{ route('home') }}" class="hover:text-blue-500">{{__('Home')}}</a></li>
                <li><a href="{{route('about')}}" class="hover:text-blue-500">{{__('About us')}}</a></li>
                <li><a href="{{route('policy')}}" class="hover:text-blue-500">{{__('Privacy Policy')}}</a></li>
            </ul>
        </div>
    </div>
    <hr>
    <p class="text-center py-8">&copy; Copyright {{ date("Y") }} <strong>Opp4af.</strong> All rights reserved.</p>
</footer>
