<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between px-4 lg:px-8">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage About') }}
            </h2>
            <a href="{{ route('admin.abouts.create') }}"
                class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full hover:bg-indigo-800 transition">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="w-full px-4 lg:px-8">
            <div class="flex flex-col p-10 overflow-hidden bg-white shadow-sm rounded-lg gap-y-5">

                @forelse ($abouts as $about)
                    <div class="flex flex-col md:flex-row items-center justify-between item-card p-6 bg-gray-50 rounded-lg shadow-md gap-x-8 gap-y-4">
                        <div class="flex flex-row items-center gap-x-6">
                            <img src="{{ Storage::url($about->thumbnail) }}" alt=""
                                class="rounded-2xl object-cover w-[100px] h-[100px]">
                            <div class="flex flex-col">
                                <p class="text-sm text-slate-500">Title</p>
                                <h3 class="text-xl font-bold text-indigo-950">{{ $about->name }}</h3>
                            </div>
                        </div>
                        <div class="flex-col hidden md:flex">
                            <p class="text-sm text-slate-500">Description</p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                {{ \Illuminate\Support\Str::limit($about->description, 100, '...') }}
                            </h3>
                        </div>
                        <div class="flex-col hidden md:flex">
                            <p class="text-sm text-slate-500">Date</p>
                            <h3 class="text-xl font-bold text-indigo-950">{{ $about->created_at->format('d M, Y') }}</h3>
                        </div>
                        <div class="flex-row items-center flex gap-x-3">
                            <a href="{{ route('admin.abouts.edit', $about) }}"
                                class="px-4 py-2 font-bold text-white bg-indigo-700 rounded-full hover:bg-indigo-800 transition">
                                Edit
                            </a>
                            <form id="delete-client-form-{{ $about->id }}" action="{{ route('admin.abouts.destroy', $about) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="px-4 py-2 font-bold text-white bg-red-700 rounded-full hover:bg-red-800 transition delete-btn" 
                                    data-id="{{ $about->id }}">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500">No data available</p>
                @endforelse
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
                    const aboutId = this.getAttribute('data-id');
                    const form = document.getElementById(`delete-client-form-${aboutId}`);

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
