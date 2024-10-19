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
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            value="{{ $client->name }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="occupation" :value="__('Occupation')" />
                        <x-text-input id="occupation" class="block w-full mt-1" type="text" name="occupation"
                            value="{{ $client->occupation }}" required autofocus autocomplete="occupation" />
                        <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="avatar" :value="__('Avatar')" />
                        <img src="{{ Storage::url($client->avatar) }}" alt=""
                            class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="avatar" class="block w-full mt-1" type="file" name="avatar" autofocus
                            autocomplete="avatar" />
                        <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="logo" :value="__('Logo')" />
                        <img src="{{ Storage::url($client->logo) }}" alt=""
                            class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="logo" class="block w-full mt-1" type="file" name="logo" autofocus
                            autocomplete="logo" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button id="submit-button" type="button" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                            Update Client
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
