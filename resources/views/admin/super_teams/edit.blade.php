<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Super Team') }}
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

                <form id="update-super-team-form" method="POST" action="{{ route('admin.super_teams.update', $superTeam) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <!-- Title Input -->
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block w-full mt-1" type="text" name="title"
                            :value="old('title', $superTeam->title)" required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Description Input -->
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" 
                                  name="description" rows="4" required>{{ old('description', $superTeam->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Logo Input -->
                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Logo')" />
                        <x-text-input id="image" class="block w-full mt-1" type="file" name="image" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />

                        @if ($superTeam->image)
                            <div class="mt-4">
                                <p class="text-sm text-slate-500">Current Image:</p>
                                <img src="{{ Storage::url($superTeam->image) }}" 
                                     alt="{{ $superTeam->title }}" class="w-32 h-32 rounded-md">
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button id="submit-button" type="button" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                            Update Super Team
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('submit-button').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default button action

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda ingin memperbarui Super Team ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, perbarui!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('update-super-team-form').submit();  // Submit the form if confirmed
                }
            });
        });
    </script>
</x-app-layout>
