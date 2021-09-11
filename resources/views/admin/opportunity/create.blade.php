<x-app-layout>
    @section('css')
        <link rel="stylesheet" href="{{ asset('css/slim-select.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sun-editor.css') }}">
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Opportunity - Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto flex justify-center sm:px-6 lg:px-8">
            <div class="bg-white w-full overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" enctype="multipart/form-data" action="{{ route('admin.opportunity.store') }}">
                        @csrf
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <x-label for="name" :value="__('Name')" :required="true" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                @error('name') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="category_id" :value="__('Category')" :required="true" />
                                <select name="category_id" required class="my-2 w-full border-none text-gray-600 bg-gray-50 rounded px-3 py-2 outline-none">
                                    <option selected></option>
                                    @foreach($categories as $category)
                                        <option {{ ($category->id == old('category_id') ?? 0) ? 'selected' : '' }} value="{{$category->id}}" class="py-1">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="organization_id" :value="__('Organization')" :required="true" />
                                <select name="organization_id" required class="my-2 w-full border-none text-gray-600 bg-gray-50 rounded px-3 py-2 outline-none">
                                    <option selected></option>
                                    @foreach($organizations as $organization)
                                        <option {{ ($organization->id == old('organization_id') ?? 0) ? 'selected' : '' }} value="{{$organization->id}}" class="py-1">{{ $organization->name }}</option>
                                    @endforeach
                                </select>
                                @error('organization_id') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="location_ids" :value="__('Location')" :required="true" />
                                <select id="location" multiple name="location_ids[]" required class="my-2 w-full border-none text-gray-600 bg-gray-50 rounded px-3 py-2 outline-none">
                                    @foreach($locations as $location)
                                        <option {{ in_array($location->id, old('location_ids') ?? []) ? 'selected' : '' }} value="{{$location->id}}" class="py-1">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                                @error('location_id') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="education_ids" :value="__('Education')" :required="true" />
                                <select id="education" multiple name="education_ids[]" required class="my-2 w-full border-none text-gray-600 bg-gray-50 rounded px-3 py-2 outline-none">
                                    @foreach($education as $edu)
                                        <option {{ in_array($edu->id, old('education_ids') ?? []) ? 'selected' : '' }} value="{{$edu->id}}" class="py-1">{{ $edu->name }}</option>
                                    @endforeach
                                </select>
                                @error('education_id') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="area_ids" :value="__('Area')" :required="true" />
                                <select id="area" multiple name="area_ids[]" required class="my-2 w-full border-none text-gray-600 bg-gray-50 rounded px-3 py-2 outline-none">
                                    @foreach($areas as $area)
                                        <option {{ in_array($area->id, old('area_ids') ?? []) ? 'selected' : '' }} value="{{$area->id}}" class="py-1">{{ $area->name }}</option>
                                    @endforeach
                                </select>
                                @error('area_id') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="fund_id" :value="__('Fund Type')" :required="true" />
                                <select name="fund_id" required class="my-2 w-full border-none text-gray-600 bg-gray-50 rounded px-3 py-2 outline-none">
                                    <option selected></option>
                                    @foreach($funds as $fund)
                                        <option {{ ($fund->id == old('fund_id') ?? 0) ? 'selected' : '' }} value="{{$fund->id}}" class="py-1">{{ $fund->name }}</option>
                                    @endforeach
                                </select>
                                @error('fund_id') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="reference" :value="__('Reference')" />
                                <x-input id="reference" class="block mt-1 w-full" type="text" name="reference" :value="old('reference')"  autofocus />
                                @error('reference') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="apply_link" :value="__('Apply Link')" />
                                <x-input id="apply_link" class="block mt-1 w-full" type="url" name="apply_link" :value="old('apply_link')"  autofocus />
                                @error('apply_link') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="website" :value="__('Website')" />
                                <x-input id="website" class="block mt-1 w-full" type="url" name="website" :value="old('website')"  autofocus />
                                @error('website') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="deadline" :value="__('Deadline')" :required="true"/>
                                <x-input id="deadline" class="block mt-1 w-full" type="date" name="deadline" :value="old('deadline')" required autofocus />
                                @error('deadline') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <x-label for="image" :value="__('Image')" :required="true" />
                                <x-input id="image" class="block mt-1 w-full" type="file" accept="image/*" name="image" required autofocus />
                                @error('image') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" :required="true" />
                            <textarea name="description" id="description" class="w-full" cols="30" rows="10" required>{{old('description')}}</textarea>
                            @error('description') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                        </div>

                        <x-button class="mt-3" >
                            {{ __('Create') }}
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
