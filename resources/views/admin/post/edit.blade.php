<x-app-layout>
    @section('title')
        Posts - Edit
    @endsection
    @section('css')
        <link rel="stylesheet" href="{{ asset('css/sun.css') }}">
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post - Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto flex justify-center sm:px-6 lg:px-8">
            <div class="bg-white w-full overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" enctype="multipart/form-data" action="{{ route('admin.post.update', $post->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <x-label for="name" :value="__('Name')" :required="true" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$post->name" required autofocus />
                                @error('name') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="short_description" :value="__('Short Description')" :required="true" />
                                <x-input id="short_description" minlength="100" class="block mt-1 w-full" type="text" name="short_description" :value="$post->short_description" required autofocus />
                                @error('short_description') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="image" :value="__('Image')"  />
                                <x-input id="image" class="block mt-1 w-full" type="file" accept="image/*" name="image" autofocus />
                                @error('image') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" :required="true" />
                            <textarea name="description" id="description" class="w-full" cols="30" rows="10" required>{{$post->description}}</textarea>
                            @error('description') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                        </div>
                        <x-button class="mt-3" >
                            {{ __('Save') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script src="{{ asset('js/sun-editor.js') }}"></script>

        <script>
            const editor = SUNEDITOR.create((document.getElementById('description') || 'description'),{
                // All of the plugins are loaded in the "window.SUNEDITOR" object in dist/suneditor.min.js file
                buttonList: [
                    ['undo', 'redo'],
                    ['font', 'fontSize', 'formatBlock'],
                    ['paragraphStyle', 'blockquote'],
                    ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
                    ['fontColor', 'hiliteColor', 'textStyle'],
                    ['removeFormat'],
                    '/', // Line break
                    ['outdent', 'indent'],
                    ['align', 'horizontalRule', 'list', 'lineHeight'],
                    ['table', 'link'],
                    ['fullScreen', 'showBlocks', 'codeView'],
                    ['preview'],
                    ['save', 'template']
                ]
            });
            editor.onChange = function (e, core) {  editor.save(); }
        </script>
    @endsection
</x-app-layout>
