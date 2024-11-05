<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('New Certification') }}
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

                <form method="POST" action="{{ route('admin.certifications.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Title Input -->
                    <div>
                        <x-input-label for="title" :value="__('Judul')" />
                        <x-text-input id="title" class="block w-full mt-1" type="text" name="title"
                            :value="old('title')" required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Description Input -->
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Deskripsi')" />
                        <textarea id="description" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" 
                                  name="description" rows="4" placeholder="Write a description">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Logo Input with Preview -->
                    <div class="mt-4">
                        <x-input-label for="logo" :value="__('Gambar Sertifikat')" />
                        <x-text-input id="logo" class="block w-full mt-1" type="file" name="logo" required
                                      onchange="previewLogo(event)" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />

                        <!-- Image Preview -->
                        <img id="logo-preview" src="#" alt="Logo Preview" class="mt-4 rounded-lg object-cover w-[200px] h-[200px]" style="display: none;">
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Add New Certification
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- CKEditor Script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector("#description"));

        // Image Preview Script
        function previewLogo(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('logo-preview');
                preview.src = reader.result;
                preview.style.display = 'block'; // Show the image preview
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>
