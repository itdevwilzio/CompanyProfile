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
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="occupation" :value="__('Pekerjaan')" />
                        <x-text-input id="occupation" class="block w-full mt-1" type="text" name="occupation"
                            :value="old('occupation')" required autofocus autocomplete="occupation" />
                        <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="location" :value="__('Lokasi')" />
                        <x-text-input id="location" class="block w-full mt-1" type="text" name="location"
                            :value="old('location')" required autofocus autocomplete="location" />
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
                        <button type="submit" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Add New Team
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Image Preview Script -->
    <script>
        function previewAvatar(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const preview = document.getElementById('avatar-preview');
                preview.src = reader.result;
                preview.classList.remove('hidden'); // Show the preview
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <!-- SweetAlert2 Form Submission -->
    <script>
        document.getElementById('submit-button').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default button action

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to add this new team member?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('create-team-form').submit();  // Submit the form if confirmed
                }
            });
        });
    </script>
</x-app-layout>
