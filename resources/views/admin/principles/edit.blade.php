<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Principle') }}
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

                <form id="update-form" method="POST" action="{{ route('admin.principles.update', $principle) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            value="{{ $principle->name }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('thumbnail')" />
                        <!-- Existing Image Preview -->
                        <img id="existing-thumbnail" src="{{ Storage::url($principle->thumbnail) }}" alt=""
                            class="rounded-2xl object-cover w-[90px] h-[90px] mb-4">
                        <!-- New Image Preview -->
                        <img id="thumbnail-preview" src="" alt="Image preview" 
                             class="rounded-2xl object-cover w-[90px] h-[90px] mb-4 hidden">
                        <x-text-input id="thumbnail" class="block w-full mt-1" type="file" name="thumbnail" 
                            autofocus autocomplete="thumbnail" accept="image/*" onchange="previewThumbnail(event)" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="subtitle" :value="__('subtitle')" />
                        <textarea name="subtitle" id="subtitle" cols="30" rows="5"
                            class="w-full border border-slate-300 rounded-xl">{{ $principle->subtitle }}</textarea>
                        <x-input-error :messages="$errors->get('subtitle')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <!-- Cancel Button -->
                        <a href="{{ route('admin.principles.index') }}"
                            class="ml-4 px-6 py-4 font-bold text-white bg-gray-500 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_6px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Cancel
                        </a>
                    
                        <!-- Update Button with 3D Effect -->
                        <button type="submit" id="update-btn" 
                            class="ml-4 px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_6px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Update Principle
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- SweetAlert and Image Preview Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // SweetAlert confirmation on submit
        document.getElementById('update-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan bisa mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, perbarui!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit(); // Submit the form if confirmed
                }
            });
        });

        // JavaScript to preview the selected thumbnail image
        function previewThumbnail(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const preview = document.getElementById('thumbnail-preview');
                const existingThumbnail = document.getElementById('existing-thumbnail');
                preview.src = reader.result;
                preview.classList.remove('hidden'); // Show the new preview image
                existingThumbnail.classList.add('hidden'); // Hide the existing image
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>
