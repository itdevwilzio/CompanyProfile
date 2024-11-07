<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Client') }}
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

                <form id="update-client-form" method="POST" action="{{ route('admin.clients.update', $client) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Name Input with CKEditor -->
                    <div>
                        <x-input-label for="name" :value="__('Nama')" />
                        <textarea id="name" class="block w-full mt-1" name="name">{{ old('name', $client->name) }}</textarea>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Occupation Input with CKEditor -->
                    <div class="mt-4">
                        <x-input-label for="occupation" :value="__('Pekerjaan')" />
                        <textarea id="occupation" class="block w-full mt-1" name="occupation">{{ old('occupation', $client->occupation) }}</textarea>
                        <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
                    </div>

                    <!-- Avatar Input with Preview -->
                    <div class="mt-4">
                        <x-input-label for="avatar" :value="__('Foto Profil')" />
                        <!-- Display the current avatar image with an ID -->
                        <img id="current-avatar" src="{{ Storage::url($client->avatar) }}" alt="Current Avatar"
                             class="rounded-2xl object-cover w-[90px] h-[90px]">
                    
                        <!-- Preview the new avatar image -->
                        <img id="avatar-preview" class="rounded-2xl object-cover w-[90px] h-[90px] mt-4" style="display: none;">
                        
                        <x-text-input id="avatar" class="block w-full mt-1" type="file" name="avatar" autofocus
                                      autocomplete="avatar" onchange="previewImage(event, 'avatar-preview', 'current-avatar')" />
                        <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                    </div>
                    
                    <div class="mt-4">
                        <x-input-label for="logo" :value="__('Nama Perusahaan')" />
                        <!-- Display the current logo image with an ID -->
                        <img id="current-logo" src="{{ Storage::url($client->logo) }}" alt="Current Logo"
                             class="rounded-2xl object-cover w-[90px] h-[90px]">
                    
                        <!-- Preview the new logo image -->
                        <img id="logo-preview" class="rounded-2xl object-cover w-[90px] h-[90px] mt-4" style="display: none;">
                        
                        <x-text-input id="logo" class="block w-full mt-1" type="file" name="logo" autofocus
                                      autocomplete="logo" onchange="previewImage(event, 'logo-preview', 'current-logo')" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4 gap-x-4">
                        <a href="{{ route('admin.clients.index') }}" 
                            class="px-6 py-4 font-bold text-white bg-gray-500 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Cancel
                        </a>

                        <button id="submit-button" type="button" 
                            class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Update Client
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        document.getElementById('submit-button').addEventListener('click', function (event) {
            event.preventDefault();

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
                    document.getElementById('update-client-form').submit();
                }
            });
        });

        // Initialize CKEditor for each textarea field
        CKEDITOR.replace('name', {
            toolbar: [
                { name: 'document', items: ['Source', '-', 'NewPage', 'Preview', '-', 'Templates'] },
                { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
                { name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll'] },
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
                { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
                { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar'] },
                { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize', 'TextColor', 'BGColor'] },
                { name: 'tools', items: ['Maximize'] }
            ],
            height: 300,
            versionCheck: false
        });
        CKEDITOR.replace('occupation', {
            toolbar: [
                { name: 'document', items: ['Source', '-', 'NewPage', 'Preview', '-', 'Templates'] },
                { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
                { name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll'] },
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
                { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
                { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar'] },
                { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize', 'TextColor', 'BGColor'] },
                { name: 'tools', items: ['Maximize'] }
            ],
            height: 300,
            versionCheck: false
        });

        // Function to preview images
        function previewImage(event, previewId, currentImageId) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById(previewId);
                    const currentImage = document.getElementById(currentImageId);
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    currentImage.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>
