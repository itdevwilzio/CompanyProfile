<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('New Hero Section') }}
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

                <form method="POST" action="{{ route('admin.hero_sections.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-input-label for="heading" :value="__('Heading')" />
                        <x-text-input id="heading" class="block w-full mt-1" type="text" name="heading"
                            :value="old('heading')" required autofocus autocomplete="heading" />
                        <x-input-error :messages="$errors->get('heading')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="sub_heading" :value="__('Sub Heading')" />
                        <x-text-input id="sub_heading" class="block w-full mt-1" type="text" name="sub_heading"
                            :value="old('sub_heading')" required autofocus autocomplete="sub_heading" />
                        <x-input-error :messages="$errors->get('sub_heading')" class="mt-2" />
                    </div>

                    <!-- Achievement Field with CKEditor -->
                    <div class="mt-4">
                        <x-input-label for="achievement" :value="__('Deskripsi')" />
                        <textarea id="achievement" name="achievement" rows="4" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" placeholder="Deskripsi">{{ old('achievement') }}</textarea>
                        <x-input-error :messages="$errors->get('achievement')" class="mt-2" />
                    </div>

                    <!-- Banner Upload Field -->
                    <div class="mt-4">
                        <x-input-label for="banner" :value="__('Gambar banner')" />
                        <x-text-input id="banner" class="block w-full mt-1" type="file" name="banner" required
                            autofocus autocomplete="banner" onchange="previewBanner(event)" />
                        <x-input-error :messages="$errors->get('banner')" class="mt-2" />
                    </div>

                    <!-- Image Preview Section -->
                    <div class="mt-4">
                        <img id="banner-preview" class="rounded-md object-cover w-full h-[300px]" style="display: none;" alt="Banner Preview">
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Add New Hero Section
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- CKEditor Script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script>
        // Initialize CKEditor for the achievement field
    ClassicEditor
        .create(document.querySelector("#achievement"), {
            toolbar: [
            'heading', 'fontSize', 'fontColor', 'fontBackgroundColor', 'fontFamily',
            'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', 
            'alignment', 'bulletedList', 'numberedList', 'outdent', 'indent', 'link', 
            'blockQuote', 'insertTable', 'mediaEmbed', 'undo', 'redo', 'codeBlock'
            ],

            
        })
        .catch(error => {
            console.error(error);
        });
        // Image Preview Script
        function previewBanner(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('banner-preview');
                preview.src = reader.result;
                preview.style.display = 'block';  // Show the preview image
            };
            reader.readAsDataURL(event.target.files[0]); // Read the file and trigger the event
        }
    </script>
</x-app-layout>
