<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('New Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="p-10 overflow-hidden bg-white shadow-sm sm:rounded-lg">

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="w-full py-3 text-white bg-red-500 rounded-3xl">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="tagline1" :value="__('tagline1')" />
                        <x-text-input id="tagline1" class="block w-full mt-1" type="text" name="tagline1"
                            :value="old('tagline1')" required autofocus autocomplete="tagline1" />
                        <x-input-error :messages="$errors->get('tagline1')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="tagline2" :value="__('tagline2')" />
                        <x-text-input id="tagline2" class="block w-full mt-1" type="text" name="tagline2"
                            :value="old('tagline2')" required autofocus autocomplete="tagline2" />
                        <x-input-error :messages="$errors->get('tagline2')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="tagline3" :value="__('tagline3')" />
                        <x-text-input id="tagline3" class="block w-full mt-1" type="text" name="tagline3"
                            :value="old('tagline3')" required autofocus autocomplete="tagline3" />
                        <x-input-error :messages="$errors->get('tagline3')" class="mt-2" />
                    </div>
           
                    <div class="mt-4">
                        <x-input-label for="tagline4" :value="__('tagline4')" />
                        <x-text-input id="tagline4" class="block w-full mt-1" type="text" name="tagline4"
                            :value="old('tagline4')" required autofocus autocomplete="tagline4" />
                        <x-input-error :messages="$errors->get('tagline4')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="tagline4" :value="__('tagline4')" />
                        <x-text-input id="tagline4" class="block w-full mt-1" type="text" name="tagline4"
                            :value="old('tagline4')" required autofocus autocomplete="tagline4" />
                        <x-input-error :messages="$errors->get('tagline4')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('thumbnail')" />
                        <x-text-input id="thumbnail" class="block w-full mt-1" type="file" name="thumbnail" required
                            autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" class="block w-full mt-1" type="number" name="price"
                            :value="old('price')" required autofocus autocomplete="price" min="0" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                            Add New Product
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
