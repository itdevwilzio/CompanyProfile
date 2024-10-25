<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Certification') }}
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

                <form id="update-certification-form" method="POST" action="{{ route('admin.certifications.update', $certification) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <!-- Title Input -->
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block w-full mt-1" type="text" name="title"
                            :value="old('title', $certification->title)" required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Description Input -->
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" 
                                  name="description" rows="4" required>{{ old('description', $certification->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Logo Input -->
                    <div class="mt-4">
                        <x-input-label for="logo" :value="__('Logo')" />
                        <x-text-input id="logo" class="block w-full mt-1" type="file" name="logo" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />

                        @if ($certification->logo)
                            <div class="mt-4">
                                <p class="text-sm text-slate-500">Current Logo:</p>
                                <img src="{{ Storage::url($certification->logo) }}" 
                                     alt="{{ $certification->title }}" class="w-32 h-32 rounded-md">
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <!-- Cancel Button with 3D Effect -->
                        <a href="{{ route('admin.certifications.index') }}"
                            class="px-6 py-4 font-bold text-white bg-gray-500 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_6px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Cancel
                        </a>
                    
                        <!-- Update Button with 3D Effect -->
                        <button id="submit-button" type="button"
                            class="ml-4 px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_6px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Update Certification
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
    </script>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('submit-button').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default button action

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Apakah Anda ingin memperbarui sertifikasi ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, perbarui!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('update-certification-form').submit();  // Submit the form if confirmed
                }
            });
        });
    </script>
</x-app-layout>
