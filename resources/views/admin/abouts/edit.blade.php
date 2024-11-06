<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit About') }}
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

                <form id="update-about-form" method="POST" action="{{ route('admin.abouts.update', $about) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Name Field with CKEditor 4 -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <textarea id="name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" name="name" rows="2"
                            required>{{ old('name', $about->name) }}</textarea>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        <!-- Existing Image Preview -->
                        <img id="existing-thumbnail" src="{{ Storage::url($about->thumbnail) }}" alt=""
                            class="rounded-2xl object-cover w-[90px] h-[90px] mb-4">
                        <!-- New Image Preview -->
                        <img id="thumbnail-preview" src="" alt="Image preview"
                            class="rounded-2xl object-cover w-[90px] h-[90px] mb-4 hidden">
                        <x-text-input id="thumbnail" class="block w-full mt-1" type="file" name="thumbnail" autofocus
                            accept="image/*" onchange="previewThumbnail(event)" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <h3 class="mt-4 text-lg font-bold text-indigo-950">Description</h3>

                    <!-- Description Field with CKEditor 4 -->
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" name="description"
                            rows="10" required>{{ old('description', $about->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <!-- Cancel Button with 3D Effect -->
                        <a href="{{ route('admin.abouts.index') }}"
                            class="px-6 py-4 font-bold text-white bg-gray-500 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_6px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out ml-4">
                            Cancel
                        </a>

                        <!-- Update Button with 3D Effect -->
                        <button id="submit-button" type="button"
                            class="ml-4 px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_6px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Update About
                        </button>
                    </div>
                </form>

                <!-- CKEditor 4 Script -->
                <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

                <script>
                    // Initialize CKEditor 4 for each field
                    CKEDITOR.replace('name', {
                        toolbar: [{
                                name: 'document',
                                items: ['Source', '-', 'NewPage', 'Preview', '-', 'Templates']
                            },
                            {
                                name: 'clipboard',
                                items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
                            },
                            {
                                name: 'editing',
                                items: ['Find', 'Replace', '-', 'SelectAll']
                            },
                            {
                                name: 'basicstyles',
                                items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-',
                                    'RemoveFormat'
                                ]
                            },
                            {
                                name: 'paragraph',
                                items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
                            },
                            {
                                name: 'links',
                                items: ['Link', 'Unlink', 'Anchor']
                            },
                            {
                                name: 'insert',
                                items: ['Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar']
                            },
                            {
                                name: 'styles',
                                items: ['Styles', 'Format', 'Font', 'FontSize', 'TextColor', 'BGColor']
                            },
                            {
                                name: 'tools',
                                items: ['Maximize']
                            }
                        ],
                        height: 300,
                        versionCheck: false
                    });

                    CKEDITOR.replace('description', {
                        toolbar: [{
                                name: 'document',
                                items: ['Source', '-', 'NewPage', 'Preview', '-', 'Templates']
                            },
                            {
                                name: 'clipboard',
                                items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
                            },
                            {
                                name: 'editing',
                                items: ['Find', 'Replace', '-', 'SelectAll']
                            },
                            {
                                name: 'basicstyles',
                                items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-',
                                    'RemoveFormat'
                                ]
                            },
                            {
                                name: 'paragraph',
                                items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-',
                                    'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'
                                ]
                            },
                            {
                                name: 'links',
                                items: ['Link', 'Unlink', 'Anchor']
                            },
                            {
                                name: 'insert',
                                items: ['Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar']
                            },
                            {
                                name: 'styles',
                                items: ['Styles', 'Format', 'Font', 'FontSize', 'TextColor', 'BGColor']
                            },
                            {
                                name: 'tools',
                                items: ['Maximize']
                            }
                        ],
                        height: 300,
                        versionCheck: false
                    });

                    // SweetAlert confirmation on submit
                    document.getElementById('submit-button').addEventListener('click', function(event) {
                        event.preventDefault();

                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "Anda ingin memperbarui About ini?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, perbarui!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('update-about-form').submit();
                            }
                        });
                    });

                    // JavaScript to preview the selected thumbnail image
                    function previewThumbnail(event) {
                        const reader = new FileReader();
                        reader.onload = function() {
                            const preview = document.getElementById('thumbnail-preview');
                            const existingThumbnail = document.getElementById('existing-thumbnail');
                            preview.src = reader.result;
                            preview.classList.remove('hidden');
                            existingThumbnail.classList.add('hidden');
                        };
                        reader.readAsDataURL(event.target.files[0]);
                    }
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
