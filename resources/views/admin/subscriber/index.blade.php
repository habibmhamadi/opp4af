<x-app-layout>
    @section('title')
        Subscribers
    @endsection
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Subscribers') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 overflow-x-auto">
                    @if($subscribers->count())
                        <table class="min-w-max w-full table-auto">
                            <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">{{ __('No.') }}</th>
                                <th class="py-3 px-6 text-left">{{ __('Email') }}</th>
                                <th class="py-3 px-6 text-center">{{ __('Created') }}</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                            @foreach($subscribers as $subscriber)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        {{++$count}}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        {{$subscriber->email}}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        {{$subscriber->created_at->diffForHumans()}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{ $subscribers->links() }}
                    @else
                        <div>{{ __('No data found!') }}</div>
                    @endif
                </div>
            </div>
        </div>

    </div>


</x-app-layout>
