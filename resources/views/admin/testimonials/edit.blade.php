<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Testimonial') }}
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

                <form id="update-testimonial-form" method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mt-4">
                        <x-input-label for="project_client" :value="__('Nama Klien')" />
                        <select name="project_client_id" id="project_client_id"
                                class="w-full py-3 pl-3 border rounded-lg border-slate-300">
                            @if ($testimonial->client)
                                <option value="{{ $testimonial->client->id }}">{!! $testimonial->client->name !!}</option>
                            @else
                                <option value="">Select Client</option>
                            @endif
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{!! $client->name !!}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('project_client')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="message" :value="__('Pesan')" />
                        <textarea name="message" id="message" cols="30" rows="5" class="w-full border border-slate-300 rounded-xl">{!! $testimonial->message !!}</textarea>
                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        <!-- Existing Image Preview -->
                        <img id="existing-thumbnail" src="{{ Storage::url($testimonial->thumbnail) }}" alt=""
                            class="rounded-2xl object-cover w-[90px] h-[90px] mb-4">
                        <!-- New Image Preview -->
                        <img id="thumbnail-preview" src="" alt="Image preview"
                            class="rounded-2xl object-cover w-[90px] h-[90px] mb-4 hidden">
                        <x-text-input id="thumbnail" class="block w-full mt-1" type="file" name="thumbnail" autofocus
                            accept="image/*" onchange="previewThumbnail(event)" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('admin.testimonials.index') }}" 
                            class="px-6 py-4 font-bold text-white bg-gray-500 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_6px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out ml-4">
                            Cancel
                        </a>
                    
                        <button id="submit-button" type="button"
                            class="ml-4 px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_6px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Update Testimonial
                        </button>
                    </div>
                    
                </form>

            </div>
        </div>
    </div>

    <!-- CKEditor 4 Script -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('message', {
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
    </script>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('submit-button').addEventListener('click', function(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda ingin memperbarui Testimonial ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, perbarui!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('update-testimonial-form').submit();
                }
            });
        });

        // Image Preview Script
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
</x-app-layout>
