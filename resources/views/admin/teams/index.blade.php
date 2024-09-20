<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Teams') }}
            </h2>
            <a href="{{ route('admin.teams.create') }}" class="px-6 py-4 font-bold text-white bg-primary rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col p-10 overflow-hidden bg-white shadow-sm sm:rounded-lg gap-y-5">

                @forelse ($teams as $team)
                    <div class="flex flex-row items-center justify-between item-card">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($team->avatar) }}" alt=""
                                class="rounded-2xl object-cover w-[90px] h-[90px]">
                            <div class="flex flex-col">
                                <h3 class="text-xl font-bold text-indigo-950">{{ $team->name }}</h3>
                            </div>
                        </div>
                        <div class="flex-col hidden md:flex">
                            <p class="text-sm text-slate-500">Location</p>
                            <h3 class="text-xl font-bold text-indigo-950">{{ $team->location }}</h3>
                        </div>
                        <div class="flex-row items-center hidden md:flex gap-x-3">
                            <a href="{{ route('admin.teams.edit', $team) }}"
                                class="px-6 py-4 font-bold text-white bg-primary rounded-full">
                                Edit
                            </a>
                            <form id="delete-team-form-{{ $team->id }}" action="{{ route('admin.teams.destroy', $team) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="px-6 py-4 font-bold text-white bg-red-700 rounded-full delete-btn"
                                    data-id="{{ $team->id }}">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>Belum ada data terbaru</p>
                @endforelse
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

                    // Trigger SweetAlert confirmation
                    Swal.fire({
                        title: 'Naha anjeun yakin?',
                        text: "Anjeun moal tiasa ngabalikeun ieu!",
                        icon: 'peringatan',
                        showCancelButton: true,
                        confirmButtonColor: '#0C3C94',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Enya, paminta ti hapuskeun!',
                        cancelButtonText: 'Ngebatalkeun'
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
