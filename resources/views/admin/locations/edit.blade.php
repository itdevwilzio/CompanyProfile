<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Location') }}
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

                <form id="update-location-form" method="POST" action="{{ route('admin.locations.update', $location) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="my-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <textarea id="name" class="block w-full mt-1" name="name" required autofocus>{{ old('name', $location->name) }}</textarea>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Image')" />
                        <img src="{{ Storage::url($location->image) }}" alt=""
                            class="rounded-2xl object-cover w-[90px] h-[90px] mb-4">
                        <x-text-input id="image" class="block w-full mt-1" type="file" name="image" autofocus
                            autocomplete="image" onchange="previewBanner(event)" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div>
                        <img id="upload-preview" src="" class="mx-auto" alt="Preview" style="display: none; max-width: 100%; height: auto;">
                    </div>

                    <!-- CKEditor Description Field -->
                    <div class="my-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" class="block w-full mt-1" name="description">{{ old('description', $location->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button id="submit-button" type="submit" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Update Location
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- CKEditor Script -->
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize CKEditor for the description field
            CKEDITOR.replace('description', {
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
                filebrowserUploadMethod: 'form',
                versionCheck: false,
            });

            // Initialize CKEditor for the name field
            CKEDITOR.replace('name', {
                toolbar: [
                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
                    { name: 'styles', items: ['Font', 'FontSize', 'TextColor'] },
                    { name: 'tools', items: ['Maximize'] }
                ],
                height: 100,
                versionCheck: false
            });

            // Image Preview Script
            function previewBanner(event) {
                const reader = new FileReader();
                reader.onload = function() {
                    const preview = document.getElementById('upload-preview');
                    preview.src = reader.result;
                    preview.style.display = 'block';  // Show the preview image
                };
                reader.readAsDataURL(event.target.files[0]); // Read the file and trigger the event
            }
        });
    </script>
</x-app-layout>
