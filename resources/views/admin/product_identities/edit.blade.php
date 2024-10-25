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

                <form id="update-product-identity-form" method="POST" action="{{ route('admin.product_identities.update', $productIdentity) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <!-- Name Input -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            :value="old('name', $productIdentity->name)" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Description Input -->
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" 
                                  name="description" rows="4" required>{{ old('description', $productIdentity->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Details Input -->
                    <div class="mt-4">
                        <x-input-label for="details" :value="__('Details')" />
                        <textarea id="details" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" 
                                  name="details" rows="4">{{ old('details', $productIdentity->details) }}</textarea>
                        <x-input-error :messages="$errors->get('details')" class="mt-2" />
                    </div>

                    <!-- Vision Input -->
                    <div class="mt-4">
                        <x-input-label for="vision" :value="__('Vision')" />
                        <textarea id="vision" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="vision" rows="4">{{ old('vision', $productIdentity->vision) }}</textarea>
                        <x-input-error :messages="$errors->get('vision')" class="mt-2" />
                    </div>

                    <!-- Mission Input -->
                    <div class="mt-4">
                        <x-input-label for="mission" :value="__('Mission')" />
                        <textarea id="mission" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="mission" rows="4">{{ old('mission', $productIdentity->mission) }}</textarea>
                        <x-input-error :messages="$errors->get('mission')" class="mt-2" />
                    </div>

                    <!-- Content Level 1 Input -->
                    <div class="mt-4">
                        <x-input-label for="contentl1" :value="__('Content Level 1')" />
                        <textarea id="contentl1" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="contentl1" rows="4">{{ old('contentl1', $productIdentity->contentl1) }}</textarea>
                        <x-input-error :messages="$errors->get('contentl1')" class="mt-2" />
                    </div>

                    <!-- Content Level 2 Input -->
                    <div class="mt-4">
                        <x-input-label for="contentl2" :value="__('Content Level 2')" />
                        <textarea id="contentl2" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="contentl2" rows="4">{{ old('contentl2', $productIdentity->contentl2) }}</textarea>
                        <x-input-error :messages="$errors->get('contentl2')" class="mt-2" />
                    </div>

                    <!-- Content Level 3 Input -->
                    <div class="mt-4">
                        <x-input-label for="contentl3" :value="__('Content Level 3')" />
                        <textarea id="contentl3" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="contentl3" rows="4">{{ old('contentl3', $productIdentity->contentl3) }}</textarea>
                        <x-input-error :messages="$errors->get('contentl3')" class="mt-2" />
                    </div>

                    <!-- Logo Input -->
                    <div class="mt-4">
                        <x-input-label for="logo" :value="__('Logo')" />
                        <x-text-input id="logo" class="block w-full mt-1" type="file" name="logo" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />

                        @if ($productIdentity->logo)
                            <div class="mt-4">
                                <p class="text-sm text-slate-500">Current Logo:</p>
                                <img src="{{ Storage::url($productIdentity->logo) }}" 
                                     alt="{{ $productIdentity->name }}" class="w-32 h-32 rounded-md">
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <!-- Cancel Button with 3D Effect -->
                        <a href="{{ route('admin.product_identities.index') }}"
                            class="px-6 py-4 font-bold text-white bg-gray-500 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_6px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out ml-4">
                            Cancel
                        </a>
                    
                        <!-- Update Button with 3D Effect -->
                        <button id="submit-button" type="button"
                            class="ml-4 px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_6px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Update Product Identity
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- CKEditor Script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script>
        // Initialize CKEditor for each textarea field
        ClassicEditor.create(document.querySelector("#description"));
        ClassicEditor.create(document.querySelector("#details"));
        ClassicEditor.create(document.querySelector("#vision"));
        ClassicEditor.create(document.querySelector("#mission"));
        ClassicEditor.create(document.querySelector("#contentl1"));
        ClassicEditor.create(document.querySelector("#contentl2"));
        ClassicEditor.create(document.querySelector("#contentl3"));
    </script>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('submit-button').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default button action

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Apakah Anda ingin memperbarui identitas produk ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, perbarui!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('update-product-identity-form').submit();  // Submit the form if confirmed
                }
            });
        });
    </script>
</x-app-layout>
