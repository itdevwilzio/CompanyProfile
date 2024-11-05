<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('New Testimonial') }}
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

                <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mt-4">
                        <x-input-label for="project_client" :value="__('Nama Klien')" />

                        <select name="project_client_id" id="project_client_id"
                            class="w-full py-3 pl-3 border rounded-lg border-slate-300">
                            <option value="">Choose project_client</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('project_client')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="message" :value="__('Isi Kesan')" />
                        <textarea name="message" id="message" cols="30" rows="5" class="w-full border border-slate-300 rounded-xl"></textarea>
                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Screenshot Pesan')" />
                        <x-text-input id="thumbnail" class="block w-full mt-1" type="file" name="thumbnail" required
                            autofocus autocomplete="thumbnail" onchange="previewThumbnail(event)" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <!-- Image Preview -->
                    <div class="mt-4">
                        <img id="thumbnail-preview" class="rounded-md object-cover w-[200px] h-[200px]" style="display: none;">
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Add New Testimonial
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- JavaScript to preview thumbnail image -->
    <script>
        function previewThumbnail(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('thumbnail-preview');
                preview.src = reader.result;
                preview.style.display = 'block';  // Show the image preview
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>
