<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User - Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto flex justify-center sm:px-6 lg:px-8">
            <div class="bg-white w-full sm:w-2/5 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{ route('admin.user.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <x-label for="name" :value="__('Name')" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus />
                        @error('name') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                        <br>
                        <div class="flex items-center text-gray-500 mb-1">
                            <hr class="flex-1"> {{__('Change Password')}} <hr class="flex-1">
                        </div>
                        <x-label for="current_password" :value="__('Current Password')" />
                        <x-input id="current_password" class="block mt-1 w-full" type="password" name="current_password" />
                        @error('current_password') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                        <div class="mb-2"></div>
                        <x-label for="new_password" :value="__('New Password')" />
                        <x-input id="new_password" class="block mt-1 w-full" type="password" name="new_password" />
                        @error('new_password') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                        <div class="mb-2"></div>
                        <x-label for="new_password_confirmation" :value="__('Confirm New Password')" />
                        <x-input id="new_password_confirmation" class="block mt-1 w-full" type="password" name="new_password_confirmation" />
                        @error('new_password_confirmation') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                        <x-button class="mt-3" >
                            {{ __('Save') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
