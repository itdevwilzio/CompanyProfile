<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between px-4 lg:px-8">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Hero Sections') }}
            </h2>
            <a href="{{ route('admin.hero_sections.create') }}"
            class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="w-full px-4 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @forelse ($hero_sections as $hero_section)
                            <div class="swiper-slide flex flex-row items-center justify-between p-10 gap-x-6">
                                <div class="flex flex-row items-center gap-x-6">
                                    <img src="{{ Storage::url($hero_section->banner) }}" alt=""
                                        class="rounded-2xl object-cover w-[100px] h-[100px]">
                                    <div class="flex flex-col">
                                        <h3 class="text-xl font-bold text-indigo-950">{{ $hero_section->heading }}</h3>
                                    </div>
                                </div>
                                <div class="flex-col hidden md:flex">
                                    <p class="text-sm text-slate-500">Date</p>
                                    <h3 class="text-xl font-bold text-indigo-950">{{ $hero_section->created_at->format('Y-m-d') }}</h3>
                                </div>
                                <div class="flex-row items-center hidden md:flex gap-x-4">
                                    <a href="{{ route('admin.hero_sections.edit', $hero_section) }}"
                                        class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.hero_sections.destroy', $hero_section) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="px-6 py-4 font-bold text-white bg-red-700 rounded-full delete-btn">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="p-10 text-center">No recent data available</p>
                        @endforelse
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    
                    <!-- Add Navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const swiper = new Swiper('.swiper-container', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                slidesPerView: 1,
                spaceBetween: 10,
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 40,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 50,
                    },
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                effect: 'slide', // You can change this to 'fade', 'cube', etc.
            });

            // SweetAlert for Delete Confirmation
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda tidak akan bisa mengembalikan ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</x-app-layout>
