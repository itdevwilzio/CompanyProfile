<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Super Teams') }}
            </h2>
            <a href="{{ route('admin.super_teams.create') }}"
                  class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-16">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col p-12 overflow-hidden bg-white shadow-sm sm:rounded-lg gap-y-8">
                @forelse ($super_teams as $super_team)
                    <div class="flex flex-row items-center justify-between item-card p-6 bg-gray-50 rounded-lg shadow-md gap-x-8">
                        <div class="flex flex-row items-center gap-x-8">
                            <img src="{{ $super_team->image ? Storage::url($super_team->image) : asset('assets/placeholder.png') }}" 
                                alt="{{ $super_team->title }}" 
                                class="rounded-2xl object-cover w-[100px] h-[100px]">
                            <div class="flex flex-col">
                                <p class="text-sm text-slate-500">Title</p>
                                <h3 class="text-xl font-bold text-indigo-950">{{ $super_team->title }}</h3>
                            </div>
                        </div>
                        <div class="flex-col hidden md:flex">
                            <p class="text-sm text-slate-500">Description</p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                {{ \Illuminate\Support\Str::limit($super_team->description, 100, '...') }}
                            </h3>
                        </div>
                        <div class="flex-col hidden md:flex md:gap-x-3">
                            <p class="text-sm text-slate-500">Date</p>
                            <h3 class="text-xl font-bold text-indigo-950">{{ $super_team->created_at->format('d M, Y') }}</h3>
                        </div>
                        <div class="flex-row items-center hidden md:flex gap-x-3">
                            <a href="{{ route('admin.super_teams.edit', $super_team) }}"
                                class="px-6 py-3 font-bold text-white bg-indigo-700 rounded-full">
                                Edit
                            </a>
                            <form id="delete-super-team-form-{{ $super_team->id }}" 
                                action="{{ route('admin.super_teams.destroy', $super_team) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="px-6 py-3 font-bold text-white bg-red-700 rounded-full delete-btn" 
                                   data-id="{{ $super_team->id }}">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500">No Super Teams available</p>
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
                    const form = document.getElementById(`delete-super-team-form-${teamId}`);

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
