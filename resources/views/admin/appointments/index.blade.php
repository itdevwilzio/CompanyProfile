<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Appointments') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col p-10 overflow-hidden bg-white shadow-sm sm:rounded-lg gap-y-5">

                @forelse ($appointments as $appointment)
                    <div class="flex flex-row items-center justify-between item-card">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($appointment->product->thumbnail) }}" alt=""
                                class="rounded-2xl object-cover w-[90px] h-[90px]">
                            <div class="flex flex-col">
                                <h3 class="text-xl font-bold text-indigo-950">{{ $appointment->name }}</h3>
                            </div>
                        </div>
                        <div class="flex-col hidden md:flex">
                            <p class="text-sm text-slate-500">Budget</p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                ${{ number_format($appointment->budget, 0, ',', '.') }}
                            </h3>
                        </div>
                        <div class="flex-col hidden md:flex">
                            <p class="text-sm text-slate-500">Date</p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                {{ $appointment->meeting_at->format('M d, Y') }}</h3>
                        </div>
                        <div class="flex-row items-center hidden md:flex gap-x-3">
                            <a href="{{ route('admin.appointments.show', $appointment) }}"
                                class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                                Details
                            </a>

                            <!-- Delete Form -->
                            <form id="delete-form-{{ $appointment->id }}" action="{{ route('admin.appointments.destroy', $appointment) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="px-6 py-4 font-bold text-white bg-red-700 rounded-full delete-btn"
                                    data-id="{{ $appointment->id }}">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>Belum ada data terbaru</p>
                @endforelse

                <!-- Pagination -->
                {{ $appointments->links() }}
            </div>
        </div>
    </div>

    <!-- SweetAlert Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                const appointmentId = this.getAttribute('data-id');
                const deleteForm = document.getElementById(`delete-form-${appointmentId}`);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteForm.submit(); // Submit the form if confirmed
                    }
                });
            });
        });
    </script>
</x-app-layout>
