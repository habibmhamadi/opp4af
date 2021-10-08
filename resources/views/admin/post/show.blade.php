<x-app-layout>
    @section('title')
        Posts - View
    @endsection
    @section('css')
            <link rel="stylesheet" href="{{ asset('css/desc.css') }}">
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post - Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto flex justify-center sm:px-6 lg:px-8">
            <div class="bg-white w-full overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form x-data="{ active : true }" method="post" action="{{ route( $post->published ? 'admin.post.unpublish' : 'admin.post.publish', $post->id) }}">
                        @csrf
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <x-label for="name" :value="__('Name')" :required="true" />
                                <x-input disabled id="name" class="block mt-1 w-full" type="text" name="name" :value="$post->name" required autofocus />
                            </div>
                            <div>
                                <x-label for="short_description" :value="__('Short Description')" :required="true" />
                                <p>{{$post->short_description}}</p>
                            </div>
                            <div>
                                <x-label for="image" :value="__('Image')"  />
                                <img src="{{$post->getImageUrl()}}" class="w-16 object-cover" alt="">
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" :required="true" />
                            <div class="w-full mt-4 mb-2 desc">{!! $post->description !!}</div>
                        </div>
                        @can('admin')
                            <x-button x-bind:disabled="!active" class="mt-3 {{$post->published ? 'bg-red-500' : 'bg-green-500'}}" >
                                {{ __( $post->published ? 'Unpublish' : 'Publish') }}
                            </x-button>
                        @endcan
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
