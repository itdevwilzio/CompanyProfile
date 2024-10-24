<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between px-4 lg:px-8">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Teams') }}
            </h2>
            <a href="{{ route('admin.teams.create') }}" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="px-4 lg:px-8">
            <div class="flex flex-col p-10 overflow-hidden bg-white shadow-sm sm:rounded-lg gap-y-4"> <!-- Reduced gap-y -->
                @forelse ($teams as $team)
                    <div class="flex flex-row items-center justify-between item-card p-4 bg-gray-50 rounded-lg shadow-md gap-x-4"> <!-- Reduced gap-x -->
                        <div class="flex flex-row items-center gap-x-4"> <!-- Reduced the gap between avatar and text -->
                            <!-- Avatar with fallback if not available -->
                            @if ($team->avatar)
                                <img src="{{ Storage::url($team->avatar) }}" alt="{{ $team->name }}"
                                     class="rounded-2xl object-cover w-[80px] h-[80px]"> <!-- Reduced image size -->
                            @else
                                <img src="{{ asset('images/default-avatar.png') }}" alt="Default Avatar"
                                     class="rounded-2xl object-cover w-[80px] h-[80px]"> <!-- Reduced image size -->
                            @endif
                            <div class="flex flex-col gap-y-0.5"> <!-- Reduced gap-y to tighten text -->
                                <p class="text-sm text-slate-500">Name</p>
                                <h3 class="text-lg font-bold text-indigo-950">{{ $team->name }}</h3> <!-- Reduced font size -->
                            </div>
                            <div class="flex flex-col gap-y-0.5"> <!-- Reduced gap-y to tighten text -->
                                <p class="text-sm text-slate-500">Team</p>
                                <h3 class="text-lg font-bold text-indigo-950">{{ $team->team }}</h3> <!-- Reduced font size -->
                            </div>
                        </div>
                        <div class="flex-col flex gap-y-0.5"> <!-- Reduced gap-y for better spacing -->
                            <p class="text-sm text-slate-500">Location</p>
                            <h3 class="text-lg font-bold text-indigo-950">{{ $team->location }}</h3> <!-- Reduced font size -->
                        </div>
                        <div class="flex-row items-center hidden md:flex gap-x-2"> <!-- Reduced gap-x for tighter action buttons -->
                            <a href="{{ route('admin.teams.edit', $team) }}"
                               class="px-4 py-2 font-bold text-white bg-primary rounded-full"> <!-- Reduced padding -->
                                Edit
                            </a>
                            <form id="delete-team-form-{{ $team->id }}" action="{{ route('admin.teams.destroy', $team) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="px-4 py-2 font-bold text-white bg-red-700 rounded-full delete-btn" 
                                        data-id="{{ $team->id }}">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500">No recent data available</p>
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

                    // Show SweetAlert confirmation
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#0C3C94',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
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
