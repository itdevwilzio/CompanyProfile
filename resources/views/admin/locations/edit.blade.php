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
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            value="{{ $location->name }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Image')" />
                        <img src="{{ Storage::url($location->image) }}" alt=""
                            class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="image" class="block w-full mt-1" type="file" name="image" autofocus
                            autocomplete="image" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="my-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" class="block w-full mt-1" name="description">{{ old('description', $location->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button id="submit-button" type="submit" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                            Update Location
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- CKEditor Script -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
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
            versionCheck: false
        });

        // SweetAlert2 Script for other interactions if necessary
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const teamId = this.getAttribute('data-id');
                    const form = document.getElementById(`delete-team-form-${teamId}`);
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This action cannot be undone!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#0C3C94',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</x-app-layout>
