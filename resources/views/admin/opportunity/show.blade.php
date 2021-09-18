<x-app-layout>
    @section('title')
        Opportunities - View
    @endsection
    @section('css')
        <link rel="stylesheet" href="{{ asset('css/slim-select.css') }}">
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Opportunity - Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto flex justify-center sm:px-6 lg:px-8">
            <div class="bg-white w-full overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form x-data="{ active : true }" method="post" action="{{ route( $opportunity->published ? 'admin.opportunity.unpublish' : 'admin.opportunity.publish', $opportunity->id) }}">
                        @csrf
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <x-label for="name" :value="__('Name')" :required="true" />
                                <x-input disabled id="name" class="block mt-1 w-full" type="text" name="name" :value="$opportunity->name" required autofocus />
                            </div>
                            <div>
                                <x-label for="category_id" :value="__('Category')" :required="true" />
                                <select disabled name="category_id" required class="my-2 w-full border-none text-gray-600 bg-gray-50 rounded px-3 py-2 outline-none">
                                    <option selected > {{$opportunity->category->name}}</option>
                                </select>
                            </div>
                            <div>
                                <x-label for="organization" :value="__('Organization')"  />
                                <x-input disabled id="organization" class="block mt-1 w-full" type="text" name="organization" :value="$opportunity->organization" autofocus />
                            </div>
                            <div>
                                <x-label for="location_ids" :value="__('Location')" :required="true" />
                                <select disabled id="location" multiple name="location_ids[]" required class="my-2 w-full border-none text-gray-600 bg-gray-50 rounded px-3 py-2 outline-none">
                                    @foreach($opportunity->locations as $location)
                                        <option selected > {{$location->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-label for="education_ids" :value="__('Education')" :required="true" />
                                <select disabled id="education" multiple name="education_ids[]" required class="my-2 w-full border-none text-gray-600 bg-gray-50 rounded px-3 py-2 outline-none">
                                    @foreach($opportunity->education as $edu)
                                        <option selected > {{$edu->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-label for="area_ids" :value="__('Area')" :required="true" />
                                <select disabled id="area" multiple name="area_ids[]" required class="my-2 w-full border-none text-gray-600 bg-gray-50 rounded px-3 py-2 outline-none">
                                    @foreach($opportunity->areas as $area)
                                        <option selected > {{$area->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-label for="fund_id" :value="__('Fund Type')" :required="true" />
                                <select disabled name="fund_id" required class="my-2 w-full border-none text-gray-600 bg-gray-50 rounded px-3 py-2 outline-none">
                                    <option selected>{{$opportunity->fund->name}}</option>
                                </select>
                            </div>
                            <div>
                                <x-label for="deadline" :value="__('Deadline')" :required="true"/>
                                @if($opportunity->deadline)
                                    <x-input disabled id="deadline" class="block mt-1 w-full" type="date" name="deadline" :value="$opportunity->deadline->toDateString()" required autofocus />
                                @endif
                            </div>
                            <div>
                                <x-label for="image" :value="__('Image')"  />
                                <img src="{{$opportunity->getImageUrl()}}" class="w-16 object-cover" alt="">
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" :required="true" />
                            <div class="w-full mt-4 mb-2">{!! $opportunity->description !!}</div>
                        </div>
                        @can('admin')
                            <x-button x-bind:disabled="!active" class="mt-3 {{$opportunity->published ? 'bg-red-500' : 'bg-green-500'}}" >
                                {{ __( $opportunity->published ? 'Unpublish' : 'Publish') }}
                            </x-button>
                        @endcan
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script src="{{ asset('js/slim-select.js') }}"></script>
        <script>
            new SlimSelect({
                select: '#location'
            })
            new SlimSelect({
                select: '#education'
            })
            new SlimSelect({
                select: '#area'
            })
        </script>
    @endsection
</x-app-layout>
