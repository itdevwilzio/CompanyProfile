<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Team') }}
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

                <form id="update-team-form" method="POST" action="{{ route('admin.teams.update', $team) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            value="{{ $team->name }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="occupation" :value="__('Occupation')" />
                        <x-text-input id="occupation" class="block w-full mt-1" type="text" name="occupation"
                            value="{{ $team->occupation }}" required autofocus autocomplete="occupation" />
                        <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="location" :value="__('Location')" />
                        <x-text-input id="location" class="block w-full mt-1" type="text" name="location"
                            value="{{ $team->location }}" required autofocus autocomplete="location" />
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="team" :value="__('Team')" />
                        <select id="team" name="team" class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required autofocus>
                            <option value="">-- Pilih Tim --</option>
                            <option value="Pimpinan" {{ old('team') == 'Pimpinan' ? 'selected' : '' }}>Pimpinan</option>
                            <option value="IT & Administrative Team" {{ old('team') == 'IT & Administrative Team' ? 'selected' : '' }}>IT & Administrative Team</option>
                            <option value="Technician Team" {{ old('team') == 'Technician Team' ? 'selected' : '' }}>Technician Team</option>
                        </select>
                        <x-input-error :messages="$errors->get('team')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="avatar" :value="__('Avatar')" />
                        <img src="{{ Storage::url($team->avatar) }}" alt=""
                            class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="avatar" class="block w-full mt-1" type="file" name="avatar" autofocus
                            autocomplete="avatar" />
                        <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button id="submit-button" type="button" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                            Update Team
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- SweetAlert2 Script -->

   <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll('.delete-btn');

        // Add event listener to each delete button
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const teamId = this.getAttribute('data-id');
                const form = document.getElementById(`delete-team-form-${teamId}`);

                // Show SweetAlert confirmation
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak akan bisa mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0C3C94',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();  // Submit the form if confirmed
                    }
                });
            });
        });
    });
</script>
</x-app-layout>
