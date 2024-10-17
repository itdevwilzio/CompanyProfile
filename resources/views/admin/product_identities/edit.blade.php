<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Product Identity') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="p-10 overflow-hidden bg-white shadow-sm sm:rounded-lg">

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="w-full py-3 text-white bg-red-500 rounded-3xl mb-2">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.product_identity.update', $product_identity) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <!-- Name Input -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            :value="old('name', $product_identity->name)" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Description Input -->
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" 
                                  name="description" rows="4" required>{{ old('description', $product_identity->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Details Input -->
                    <div class="mt-4">
                        <x-input-label for="details" :value="__('Details')" />
                        <textarea id="details" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" 
                                  name="details" rows="4">{{ old('details', $product_identity->details) }}</textarea>
                        <x-input-error :messages="$errors->get('details')" class="mt-2" />
                    </div>

                    <!-- Logo Input -->
                    <div class="mt-4">
                        <x-input-label for="logo" :value="__('Logo')" />
                        <x-text-input id="logo" class="block w-full mt-1" type="file" name="logo" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />

                        @if ($product_identity->logo)
                            <div class="mt-4">
                                <p class="text-sm text-slate-500">Current Logo:</p>
                                <img src="{{ Storage::url($product_identity->logo) }}" 
                                     alt="{{ $product_identity->name }}" class="w-32 h-32 rounded-md">
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                            Update Product Identity
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</x-app-layout>
