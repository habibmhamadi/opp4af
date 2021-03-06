<x-app-layout>
    @section('title')
        Categories - Edit
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category - Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto flex justify-center sm:px-6 lg:px-8">
            <div class="bg-white w-full sm:w-2/5 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{ route('admin.category.update', $category->id) }}">
                        @csrf
                        @method('PUT')
                        <x-label for="name" :value="__('Name')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$category->name" required autofocus />
                        @error('name') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                        <x-button class="mt-3" >
                            {{ __('Save') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
