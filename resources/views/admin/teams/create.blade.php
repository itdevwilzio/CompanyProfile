<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('New Team') }}
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

                <form id="create-team-form" method="POST" action="{{ route('admin.teams.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Nama')" />
                        <textarea id="name" class="block w-full mt-1" name="name" required autofocus>{{ old('name') }}</textarea>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="occupation" :value="__('Pekerjaan')" />
                        <textarea id="occupation" class="block w-full mt-1" name="occupation" required autofocus>{{ old('occupation') }}</textarea>
                        <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="location" :value="__('Lokasi')" />
                        <textarea id="location" class="block w-full mt-1" name="location" required autofocus>{{ old('location') }}</textarea>
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="team" :value="__('Tim')" />
                        <select id="team" name="team" class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required autofocus>
                            <option value="">-- Pilih Tim --</option>
                            <option value="Pimpinan" {{ old('team') == 'Pimpinan' ? 'selected' : '' }}>Pimpinan</option>
                            <option value="IT & Administrative Team" {{ old('team') == 'IT & Administrative Team' ? 'selected' : '' }}>IT & Administrative Team</option>
                            <option value="Technician Team" {{ old('team') == 'Technician' ? 'selected' : '' }}>Technician Team</option>
                        </select>
                        <x-input-error :messages="$errors->get('team')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="avatar" :value="__('Foto Profil')" />
                        <!-- Avatar Preview -->
                        <img id="avatar-preview" class="rounded-2xl object-cover w-[90px] h-[90px] mb-3 hidden" />
                        <x-text-input id="avatar" class="block w-full mt-1" type="file" name="avatar" required
                            autofocus autocomplete="avatar" onchange="previewAvatar(event)" />
                        <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="button" id="submit-button" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Add New Team
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- CKEditor 4 Script -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        // Initialize CKEditor 4 for each applicable field
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
        CKEDITOR.replace('location', {
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
        // Image Preview Script
        function previewAvatar(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const preview = document.getElementById('avatar-preview');
                preview.src = reader.result;
                preview.classList.remove('hidden'); // Show the preview
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        // SweetAlert2 Form Submission
        document.getElementById('submit-button').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default button action

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Apakah Anda ingin menambahkan anggota tim baru ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, tambahkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('create-team-form').submit();  // Submit the form if confirmed
                }
            });
        });
    </script>
</x-app-layout>
