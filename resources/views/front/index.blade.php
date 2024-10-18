@extends('front.layouts.app')

@section('content')
<!-- Full Screen Wave and Particle Section -->
<div id="header" class="relative w-full overflow-hidden bg-[#0E3995]">
    <!-- Container for Carousel and Particles -->
    <div class="container max-w-[1130px] mx-auto relative pt-2 z-10 main-carousel">
        <x-navbar></x-navbar>

        <!-- Wave SVG Positioned Above the Carousel but outside the container -->
        <div class="wave-container w-full absolute top-0 left-0 z-[-1]">
            <!-- Existing SVG Wave -->
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#043E8A" fill-opacity="0.33"
                    d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z">
                </path>
                <path fill="#0A47B3" fill-opacity="0.66"
                    d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z">
                </path>
                <path fill="#1565C0"
                    d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z">
                </path>
            </svg>
        </div>

        <!-- Carousel Section -->
        <section id="wave-particles" class="relative w-full h-auto overflow-hidden mt-28">
            <div class="carousel-container mt-4 relative overflow-hidden rounded-xl shadow-lg">
                <!-- Carousel Wrapper -->
                <div class="carousel w-full"
                    data-flickity='{ "wrapAround": true, "autoPlay": 4000, "prevNextButtons": true, "pageDots": true, "pauseAutoPlayOnHover": true }'>
                    @forelse ($hero_section as $hero)
                        <div class="carousel-cell w-full h-[400px] md:h-[500px] lg:h-[600px]">
                            <div class="relative w-full h-full flex justify-center items-center">
                                <img src="{{ Storage::url($hero->banner) }}"
                                     srcset="{{ Storage::url($hero->banner) }} 1024w,
                                             {{ Storage::url($hero->banner) }} 640w"
                                     sizes="(max-width: 768px) 640px, 1024px"
                                     class="object-cover w-[800px] h-auto rounded-lg shadow-lg" alt="Promo Banner: {{ $hero->description }}" loading="lazy">
                            </div>
                        </div>
                    @empty
                        <!-- Fallback if no images are available -->
                        <div class="carousel-cell w-full h-[250px] sm:h-[400px] md:h-[500px] lg:h-[600px]">
                            <div class="relative">
                                <img src="{{ asset('assets/banners/banner.png') }}" class="object-cover w-full h-full rounded-lg shadow-lg" alt="No banners available">
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- CSS for Carousel and Wave -->
        <style>
            .wave-container {
                position: relative;
                width: 100%;
                height: auto;
            }

            .carousel-container {
                position: relative;
                z-index: 2;
            }

            .carousel {
                margin-top: 0;
            }
        </style>
    </div>
</div>

<div id="Bangun" class="container max-w-[1140px] mx-auto flex flex-col gap-[40px] mt-16 mb-16 bg-white p-12 rounded-xl shadow-2xl">
    <!-- Title Section -->
    <h2 class="font-permanent text-5xl font-bold text-center text-[#0E3995]">
        Buka Peluang Baru dengan Koneksi Internet Terbaik
    </h2>
    
    <!-- Content Section -->
    <div class="flex flex-col items-center md:flex-row justify-between gap-10">
        <!-- Left Content -->
        <div class="md:w-5/12 text-center md:text-left flex flex-col items-center justify-center md:items-start md:justify-start">
            <p class="font-nunito font-semibold text-xl text-[#0E3995] mb-4">
                Membangun Indonesia lebih maju dimulai dari akses internet yang merata.
            </p>
            <p class="font-nunito font-semibold text-xl text-[#0E3995] mb-6">
                Ayo bergabung dengan WIJA BACKBONE dan jadilah bagian dari pergerakan untuk memperluas jangkauan internet cepat dan berkualitas.
            </p>
            <div class="mt-6 flex justify-center items-center w-full">
                <a href="https://wa.me/6285179709387"
                   id="joinButton"
                   class="bg-orange-500 font-semibold text-primary px-8 py-4 rounded-full shadow-lg hover:bg-orange-600 hover:shadow-xl transform hover:scale-95 transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-orange-400">
                    Mulai Bergabung
                </a>
            </div>
        </div>

        <!-- Right Content - Single Image -->
        <div class="md:w-7/12">
            <img src="{{ asset('assets/joins/cover1.jpg') }}" 
                 alt="cover image"
                 class="rounded-lg shadow-lg w-full h-auto object-cover">
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="w-full main-carousel py-16 mt-16 bg-[#0E3995]">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <!-- Star Icons -->
        <div class="flex justify-center mb-2">
            @for ($i = 0; $i < 5; $i++)
                <img src="{{ asset('assets/icons/Star-rating.svg') }}" class="w-6 h-6 mx-1" alt="star">
            @endfor
        </div>

        <!-- Rating Title -->
        <h2 class="font-nunito font-bold text-white text-4xl text-center mb-4">
            <span id="rating" class="rolling-number">4.85</span> / 5 Rating Pelanggan
        </h2>
        <!-- Main Heading -->
        <h3 class="font-nunito font-bold text-[#ff9802] text-3xl text-center mb-12">
            Apa Kata Mereka?
        </h3>

        <!-- Flickity Carousel -->
        <div class="carousel"
             data-flickity='{ "wrapAround": true, "autoPlay": 3000, "prevNextButtons": false, "pageDots": true, "groupCells": 1 }'>
            @forelse ($testimonials as $testimonial)
            <div class="carousel-cell bg-white p-8 rounded-lg shadow-md relative mx-4 w-full lg:w-[30%] border border-gray-300 hover:shadow-lg transition-all duration-300 ease-in-out">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-16 h-16 rounded-full overflow-hidden border border-gray-300">
                        <img src="{{ Storage::url($testimonial->client->avatar) }}" alt="Client Avatar" class="object-cover w-full h-full">
                    </div>
                    <div>
                        <p class="font-nunito font-bold text-lg text-[#0E3995]">{{ $testimonial->client->name }}</p>
                        <p class="text-sm text-[#ff9802]">{{ $testimonial->client->occupation }}</p>
                    </div>
                    <div class="absolute top-4 right-4 z-50 bg-green-500 p-1 rounded-full">
                        <img src="{{ asset('assets/icons/whatsapp.svg') }}" alt="WhatsApp" class="w-6 h-6 cursor-pointer" data-open-modal="{{ $loop->index }}">
                    </div>
                </div>

                <div class="flex items-center mb-6">
                    @php
                        $randomStars = rand(4, 5); 
                    @endphp
                    @for($i = 0; $randomStars > $i; $i++)
                        <img src="{{ asset('assets/icons/Star-rating.svg') }}" class="w-5 h-5" alt="star">
                    @endfor
                </div>

                <p class="text-gray-700 text-sm leading-6 mb-6">{{ Str::limit($testimonial->message, 150) }}
                    @if(strlen($testimonial->message) > 150)
                        <a href="javascript:void(0);" class="text-[#0E3995] font-semibold modal-open" data-modal-target="modal-{{ $loop->index }}">...Lihat selengkapnya</a>

                        <div class="modal fixed inset-0 z-50 overflow-y-auto hidden" id="modal-{{ $loop->index }}" aria-labelledby="modal-{{ $loop->index }}-title" role="dialog" aria-modal="true">
                            <div class="modal-overlay absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                            <div class="modal-container relative mx-auto max-w-xl mt-20">
                                <div class="modal-content bg-white rounded-lg shadow-lg relative">
                                    <div class="modal-header py-4 px-6 border-b border-gray-200">
                                        <h3 class="modal-title text-lg font-semibold" id="modal-{{ $loop->index }}-title">Testimonial</h3>
                                        <button class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700" data-modal-toggle="modal-{{ $loop->index }}">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="modal-body px-6 py-4">
                                        {{ $testimonial->message }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </p>
            </div>
            @empty
                <p class="text-center text-white">Belum ada data terbaru</p>
            @endforelse
        </div>
    </div>
</div>

@endsection

@push('after-scripts')
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
<script src="{{ asset('js/carousel.js') }}"></script>
<script src="{{ asset('js/accordion.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script>
    const joinButton = document.getElementById('joinButton');

    joinButton.addEventListener('mouseenter', function() {
        joinButton.style.transition = 'transform 0.3s ease-in-out';
        joinButton.style.transform = 'scale(0.9)';
    });

    joinButton.addEventListener('mouseleave', function() {
        joinButton.style.transform = 'scale(1)';
    });

    joinButton.addEventListener('mousedown', function() {
        joinButton.style.transform = 'scale(0.95)';
    });

    joinButton.addEventListener('mouseup', function() {
        joinButton.style.transform = 'scale(0.9)';
    });

    // Modal functionality
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.modal-open').forEach(function (trigger) {
            trigger.addEventListener('click', function () {
                const modalId = trigger.getAttribute('data-modal-target');
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.classList.remove('hidden');
                }
            });
        });

        document.querySelectorAll('.modal-close').forEach(function (closeButton) {
            closeButton.addEventListener('click', function () {
                const modalId = closeButton.getAttribute('data-modal-toggle');
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.classList.add('hidden');
                }
            });
        });

        document.querySelectorAll('.modal').forEach(function (modal) {
            modal.addEventListener('click', function (event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    });
</script>
@endpush
