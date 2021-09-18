<x-app-layout>
    @section('title')
        Opportunities - Edit
    @endsection
    @section('css')
        <link rel="stylesheet" href="{{ asset('css/slim-select.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sun-editor.css') }}">
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Opportunity - Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto flex justify-center sm:px-6 lg:px-8">
            <div class="bg-white w-full overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" enctype="multipart/form-data" action="{{ route('admin.opportunity.update', $opportunity->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <x-label for="name" :value="__('Name')" :required="true" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$opportunity->name" required autofocus />
                                @error('name') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="category_id" :value="__('Category')" :required="true" />
                                <select name="category_id" required class="my-2 w-full border-none text-gray-600 bg-gray-50 rounded px-3 py-2 outline-none">
                                    <option selected></option>
                                    @foreach($categories as $category)
                                        <option {{ ($category->id == $opportunity->category_id) ? 'selected' : '' }} value="{{$category->id}}" class="py-1">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="organization" :value="__('Organization')"  />
                                <x-input list="organizations" id="organization" class="block mt-1 w-full" type="text" name="organization" :value="$opportunity->organization" autofocus />
                                @error('organization') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                                <datalist id="organizations">
                                    @foreach($organizations as $org)
                                        <option value="{{$org->organization}}"/>
                                    @endforeach
                                </datalist>
                            </div>
                            <div>
                                <x-label for="location_ids" :value="__('Location')" :required="true" />
                                <select id="location" multiple name="location_ids[]" required class="my-2 w-full border-none text-gray-600 bg-gray-50 rounded px-3 py-2 outline-none">
                                    @foreach($locations as $location)
                                        <option {{ $opportunity->locations->contains($location->id) ? 'selected' : '' }} value="{{$location->id}}" class="py-1">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                                @error('location_id') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="education_ids" :value="__('Education')" :required="true" />
                                <select id="education" multiple name="education_ids[]" required class="my-2 w-full border-none text-gray-600 bg-gray-50 rounded px-3 py-2 outline-none">
                                    @foreach($education as $edu)
                                        <option {{ $opportunity->education->contains($edu->id) ? 'selected' : '' }} value="{{$edu->id}}" class="py-1">{{ $edu->name }}</option>
                                    @endforeach
                                </select>
                                @error('education_id') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="area_ids" :value="__('Area')" :required="true" />
                                <select id="area" multiple name="area_ids[]" required class="my-2 w-full border-none text-gray-600 bg-gray-50 rounded px-3 py-2 outline-none">
                                    @foreach($areas as $area)
                                        <option {{ $opportunity->areas->contains($area->id) ? 'selected' : '' }} value="{{$area->id}}" class="py-1">{{ $area->name }}</option>
                                    @endforeach
                                </select>
                                @error('area_id') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="fund_id" :value="__('Fund Type')" :required="true" />
                                <select name="fund_id" required class="my-2 w-full border-none text-gray-600 bg-gray-50 rounded px-3 py-2 outline-none">
                                    <option selected></option>
                                    @foreach($funds as $fund)
                                        <option {{ $fund->id == $opportunity->fund_id ? 'selected' : '' }} value="{{$fund->id}}" class="py-1">{{ $fund->name }}</option>
                                    @endforeach
                                </select>
                                @error('fund_id') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="deadline" :value="__('Deadline')"/>
                                <x-input id="deadline" class="block mt-1 w-full" type="date" name="deadline" :value="$opportunity->deadline ? $opportunity->deadline->toDateString() : ''" autofocus />
                                @error('deadline') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="image" :value="__('Image')"  />
                                <x-input id="image" class="block mt-1 w-full" type="file" accept="image/*" name="image" autofocus />
                                @error('image') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" :required="true" />
                            <textarea name="description" id="description" class="w-full" cols="30" rows="10" required>{{$opportunity->description}}</textarea>
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
        <script src="{{ asset('js/slim-select.js') }}"></script>
        <script src="{{ asset('js/sun-editor.js') }}"></script>
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
