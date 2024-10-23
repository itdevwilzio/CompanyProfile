<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between px-4 lg:px-8">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Products') }}
            </h2>
            <a href="{{ route('admin.products.create') }}"
                class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="px-4 lg:px-8">
            <div class="flex flex-col p-10 bg-white shadow-sm sm:rounded-lg gap-y-5">
                @forelse ($products as $product)
                    <div class="flex flex-row items-center justify-between p-6 bg-gray-50 rounded-lg shadow-md gap-x-6">
                        <div class="flex flex-row items-center gap-x-6">
                            <img src="{{ $product->thumbnail ? Storage::url($product->thumbnail) : asset('images/default-thumbnail.png') }}" 
                                alt="{{ $product->name }}" class="rounded-2xl object-cover w-[100px] h-[100px]">
                            <div class="flex flex-col">
                                <h3 class="text-xl font-bold text-indigo-950">{{ $product->name }}</h3>
                            </div>
                        </div>
                        <div class="flex-col hidden md:flex">
                            <p class="text-sm text-slate-500">Date</p>
                            <h3 class="text-xl font-bold text-indigo-950">{{ $product->created_at->format('d M, Y') }}</h3>
                        </div>
                        <div class="flex-row items-center hidden md:flex gap-x-4">
                            <a href="{{ route('admin.products.edit', $product) }}"
                                class="px-6 py-3 font-bold text-white bg-indigo-700 rounded-full">
                                Edit
                            </a>
                            <form id="delete-product-form-{{ $product->id }}" action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="px-6 py-3 font-bold text-white bg-red-700 rounded-full delete-btn" data-id="{{ $product->id }}">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500">Belum ada data terbaru</p>
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
                    const productId = this.getAttribute('data-id'); // Get the correct product ID
                    const form = document.getElementById(`delete-product-form-${productId}`); // Reference the correct form
    
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
