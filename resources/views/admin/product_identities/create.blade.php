<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('New Product Identity') }}
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

                <form method="POST" action="{{ route('admin.product_identities.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Name Input -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Description Input -->
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="description" rows="4" required>{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Details Input -->
                    <div class="mt-4">
                        <x-input-label for="details" :value="__('Details')" />
                        <textarea id="details" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="details" rows="4">{{ old('details') }}</textarea>
                        <x-input-error :messages="$errors->get('details')" class="mt-2" />
                    </div>

                    <!-- Vision Input -->
                    <div class="mt-4">
                        <x-input-label for="vision" :value="__('Vision')" />
                        <textarea id="vision" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="vision" rows="4">{{ old('vision') }}</textarea>
                        <x-input-error :messages="$errors->get('vision')" class="mt-2" />
                    </div>

                    <!-- Mission Input -->
                    <div class="mt-4">
                        <x-input-label for="mission" :value="__('Mission')" />
                        <textarea id="mission" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="mission" rows="4">{{ old('mission') }}</textarea>
                        <x-input-error :messages="$errors->get('mission')" class="mt-2" />
                    </div>

                    <!-- Content Level 1 Input -->
                    <div class="mt-4">
                        <x-input-label for="contentl1" :value="__('Content Level 1')" />
                        <textarea id="contentl1" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="contentl1" rows="4">{{ old('contentl1') }}</textarea>
                        <x-input-error :messages="$errors->get('contentl1')" class="mt-2" />
                    </div>

                    <!-- Content Level 2 Input -->
                    <div class="mt-4">
                        <x-input-label for="contentl2" :value="__('Content Level 2')" />
                        <textarea id="contentl2" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="contentl2" rows="4">{{ old('contentl2') }}</textarea>
                        <x-input-error :messages="$errors->get('contentl2')" class="mt-2" />
                    </div>

                    <!-- Content Level 3 Input -->
                    <div class="mt-4">
                        <x-input-label for="contentl3" :value="__('Content Level 3')" />
                        <textarea id="contentl3" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="contentl3" rows="4">{{ old('contentl3') }}</textarea>
                        <x-input-error :messages="$errors->get('contentl3')" class="mt-2" />
                    </div>

                    <!-- Logo Input -->
                    <div class="mt-4">
                        <x-input-label for="logo" :value="__('Logo')" />
                        <x-text-input id="logo" class="block w-full mt-1" type="file" name="logo" required />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                            Add New Product Identity
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @section('scripts')
        <!-- Include TinyMCE CDN -->
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

        <!-- Initialize TinyMCE -->
        <script>
            tinymce.init({
                selector: 'textarea',  // Initialize TinyMCE for all textareas
                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                toolbar_mode: 'floating',
                height: 300
            });
        </script>
    @endsection
</x-app-layout>
