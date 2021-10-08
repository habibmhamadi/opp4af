<x-app-layout>
    @section('title')
        Posts
    @endsection
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Post') }}
            </h2>
            <a href="{{ route('admin.post.create') }}" x-bind:disabled="!active" x-on:click="active = false" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">
                {{ __('Create') }}
            </a>
        </div>
    </x-slot>

    <div x-data="{ modal: false, active: true, route : '' }" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 overflow-x-auto">
                    <x-auth-session-status class="mb-4" :status="session('success')" />
                    <div class="grid grid-cols-1 md:grid-cols-2 mb-4 gap-x-4 gap-y-2">
                        <form onsubmit="event.preventDefault(); updateFilter()" id="form" action="{{route('admin.post.index')}}" method="GET">
                            <input name="query" value="{{$query}}" id="query" type="search" placeholder="Search by name" class="rounded border-gray-200 focus:ring-blue-200 w-full">
                        </form>
                        <select id="state" onchange="updateFilter()" name="state" class="w-full border-none text-gray-500 bg-gray-50 rounded px-3 py-2 outline-none">
                            <option {{ request()->query('state', '') == '' ? 'selected' : '' }} value="">-- {{__('State')}} --</option>
                            <option {{ request()->query('state', '') == 'published' ? 'selected' : '' }} value="published">{{ __('Published') }}</option>
                            <option {{ request()->query('state', '') == 'unpublished' ? 'selected' : '' }} value="unpublished">{{ __('Un-published') }}</option>
                            <option {{ request()->query('state', '') == 'view' ? 'selected' : '' }} value="view">{{ __('Most Viewed') }}</option>
                        </select>
                    </div>
                    @if($posts->count())
                        <table class="min-w-max w-full table-auto">
                            <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">{{ __('No.') }}</th>
                                <th class="py-3 pl-6 text-left">{{ __('Name') }}</th>
                                <th class="py-3 pl-6 text-left">{{ __('Views') }}</th>
                                <th class="py-3 px-6 text-left">{{ __('User') }}</th>
                                <th class="py-3 px-6 text-center">{{ __('Created') }}</th>
                                <th class="py-3 px-6 text-center">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                            @foreach($posts as $post)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        {{++$count}}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        {{$post->name}}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        {{$post->view}}
                                    </td>
                                    <td class="py-3 pl-6 text-left">
                                        {{$post->user->name}}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        {{$post->created_at->diffForHumans()}}
                                    </td>
                                    <td class="py-3">
                                        <div class="pl-8">
                                           <div class="flex">
                                               <div class="w-5"></div>
                                               <a href="{{ route('admin.post.show', $post->id) }}" class="mr-2 transform hover:text-purple-500 hover:scale-110">
                                                   <svg class="w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                   </svg>
                                               </a>
                                               <a href="{{ route('admin.post.edit', $post->id) }}" class="mr-2 transform hover:text-purple-500 hover:scale-110">
                                                   <svg class="w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                   </svg>
                                               </a>
                                               <span @click="modal = true; route = '{{route('admin.post.destroy', $post->id)}}'" class="cursor-pointer mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg class="w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </span>
                                               @if(!$post->published)
                                                   <span class="mr-2 cursor-pointer transform hover:text-purple-500 hover:scale-110">
                                                       <form action="{{route('admin.post.publish', $post->id)}}" method="POST" id="publishForm{{$post->id}}">
                                                           @csrf
                                                           <svg onclick="document.getElementById('publishForm{{$post->id}}').submit()" class="w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                                       </form>
                                                   </span>
                                               @endif
                                           </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{ $posts->links() }}
                    @else
                        <div>{{ __('No data found!') }}</div>
                    @endif
                </div>
            </div>
        </div>

        <x-confirm-modal/>
    </div>

    @section('script')
        <script>
            function updateFilter(e) {
                let route = '{{ route('admin.post.index') }}?'
                var state = document.getElementById('state')
                var query = document.getElementById('query')

                if(state.value != '') {
                    route += `state=${state.value}&`
                }
                if (query.value != '') {
                    route += `query=${query.value}`
                }
                if(route.lastIndexOf('&') == route.length-1 || route.lastIndexOf('?') == route.length-1) {
                    route = route.substring(0, route.length-1)
                }
                location.replace(route)
            }
        </script>
    @endsection
</x-app-layout>
