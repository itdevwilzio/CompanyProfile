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
                    <!-- Name Field -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Tagline Field -->
                    <div class="mt-4">
                        <x-input-label for="tagline" :value="__('Tagline')" />
                        <x-text-input id="tagline" class="block w-full mt-1" type="text" name="tagline"
                            :value="old('tagline')" required autofocus autocomplete="tagline" />
                        <x-input-error :messages="$errors->get('tagline')" class="mt-2" />
                    </div>

                    <!-- Thumbnail Field -->
                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        <x-text-input id="thumbnail" class="block w-full mt-1" type="file" name="thumbnail" required
                            onchange="previewThumbnail(event)" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <!-- Thumbnail Preview Section -->
                    <div class="mt-4">
                        <img id="thumbnail-preview" class="rounded-lg object-cover w-[200px] h-[200px]" style="display: none;" alt="Thumbnail Preview">
                    </div>

                    <!-- About Field with CKEditor -->
                    <div class="mt-4">
                        <x-input-label for="about" :value="__('About')" />
                        <textarea name="about" id="about" cols="30" rows="5" class="w-full border border-slate-300 rounded-xl">{{ old('about') }}</textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Add New Product
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- CKEditor and Image Preview Script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script>
        // Initialize CKEditor for the about field
        ClassicEditor.create(document.querySelector("#about"))
            .catch(error => { console.error(error); });

        // Image Preview Script
        function previewThumbnail(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('thumbnail-preview');
                preview.src = reader.result;
                preview.style.display = 'block'; // Show the preview image
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</x-app-layout>
