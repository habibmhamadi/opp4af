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
                         <div class="max-w-4xl mx-auto py-32 md:py-52 lg:py-60 mt-8 bg-cover" style="background-image: url('{{ $post->getImageUrl() }}');">
                         </div>
                         <article class="max-w-4xl mx-auto mb-8">
                             <h1 class="text-4xl font-bold my-10">{{$post->name}}</h1>
                             <p class="text-gray-500 text-sm mb-4">{{$post->created_at->diffForHumans()}}</p>
                             <div class="desc">{!! $post->description !!}</div>
                         </article>
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
