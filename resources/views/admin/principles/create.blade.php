<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('New Principle') }}
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

                <form method="POST" action="{{ route('admin.principles.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        <x-text-input id="thumbnail" class="block w-full mt-1" type="file" name="thumbnail" required
                            autofocus autocomplete="thumbnail" onchange="previewThumbnail(event)" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                        
                        <!-- Image preview placeholder -->
                        <img id="thumbnail-preview" src="#" alt="Thumbnail Preview" class="rounded-2xl object-cover w-[120px] h-[120px] mt-4" style="display: none;">
                    </div>

                    <div class="mt-4">
                        <x-input-label for="subtitle" :value="__('Subtitle')" />
                        <textarea name="subtitle" id="subtitle" cols="30" rows="5"
                            class="w-full border border-slate-300 rounded-xl"></textarea>
                        <x-input-error :messages="$errors->get('subtitle')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                            Add New Principle
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- JavaScript for image preview -->
    <script>
        function previewThumbnail(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('thumbnail-preview');
                preview.src = reader.result;
                preview.style.display = 'block'; // Show the image preview
            };
            reader.readAsDataURL(event.target.files[0]); // Read the file as a Data URL
        }
    </script>
</x-app-layout>
