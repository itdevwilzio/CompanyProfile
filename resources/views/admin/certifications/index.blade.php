<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between px-4 lg:px-8">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Certifications') }}
            </h2>
            <a href="{{ route('admin.certifications.create') }}"
               class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="w-full px-4 lg:px-8">
            <div class="flex flex-col p-10 overflow-hidden bg-white shadow-sm rounded-lg gap-y-5">

                @forelse ($certifications as $certification)
                    <div class="flex flex-col md:flex-row items-center justify-between item-card p-6 bg-gray-50 rounded-lg shadow-md gap-x-8 gap-y-4">
                        <div class="flex flex-row items-center gap-x-6">
                            <img src="{{ $certification->logo ? Storage::url($certification->logo) : asset('assets/placeholder.png') }}" 
                                 alt="{{ $certification->title }}" 
                                 class="rounded-2xl object-cover w-[100px] h-[100px]">
                            <div class="flex flex-col">
                                <p class="text-sm text-slate-500">Title</p>
                                <h3 class="text-xl font-bold text-indigo-950">{{ $certification->title }}</h3>
                            </div>
                        </div>
                        <div class="flex-col hidden md:flex">
                            <p class="text-sm text-slate-500">Description</p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                {{ \Illuminate\Support\Str::limit(strip_tags($certification->description), 100, '...') }}
                            </h3>
                        </div>
                        <div class="flex-col hidden md:flex">
                            <p class="text-sm text-slate-500">Date</p>
                            <h3 class="text-xl font-bold text-indigo-950">{{ $certification->created_at->format('d M, Y') }}</h3>
                        </div>
                        <div class="flex-row items-center flex gap-x-3">
                            <!-- Edit Button with 3D Effect -->
                            <a href="{{ route('admin.certifications.edit', $certification) }}"
                               class="px-4 py-2 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_6px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                                Edit
                            </a>
                        
                            <!-- Delete Button with 3D Effect -->
                            <form id="delete-certification-form-{{ $certification->id }}" 
                                  action="{{ route('admin.certifications.destroy', $certification) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="px-4 py-2 font-bold text-white bg-red-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_6px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out delete-btn" 
                                        data-id="{{ $certification->id }}">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Select all delete buttons
            const deleteButtons = document.querySelectorAll('.delete-btn');

            // Add event listener to each delete button
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const certificationId = this.getAttribute('data-id');
                    const form = document.getElementById(`delete-certification-form-${certificationId}`);

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
