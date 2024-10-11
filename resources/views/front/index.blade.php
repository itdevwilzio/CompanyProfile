@extends('front.layouts.app')

@section('content')
<!-- Full Screen Wave and Particle Section -->
<div id="header" class="relative w-full bg-[#043E8A] overflow-hidden">
    <!-- Multi-layer Wave SVG at the Top -->
    <div class="wave-container relative">
        <svg class="absolute top-0 left-0 w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#043E8A" fill-opacity="1" d="M0,96L48,106.7C96,117,192,139,288,138.7C384,139,480,117,576,122.7C672,128,768,160,864,154.7C960,149,1056,107,1152,122.7C1248,139,1344,213,1392,250.7L1440,288L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
            <path fill="#0A47B3" fill-opacity="0.7" d="M0,160L48,186.7C96,213,192,267,288,266.7C384,267,480,213,576,213.3C672,213,768,267,864,245.3C960,224,1056,144,1152,122.7C1248,101,1344,139,1392,154.7L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
            <path fill="#1565C0" fill-opacity="0.4" d="M0,224L48,213.3C96,203,192,181,288,176C384,171,480,181,576,197.3C672,213,768,235,864,213.3C960,192,1056,128,1152,101.3C1248,75,1344,85,1392,90.7L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
        </svg>
    </div>

    <!-- Container for Carousel and Particles -->
    <div class="container max-w-[1130px] mx-auto relative pt-2 z-10 main-carousel">
        <x-navbar></x-navbar>
        <div class="carousel-container mt-4 relative overflow-hidden bg-[#043E8A] p-8 rounded-xl shadow-lg">
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
    </div>

    <!-- Particle Effect -->
    <div class="wave-container">
        <div class="particle" style="width: 8px; height: 8px; top: 50px; left: 80px;"></div>
        <div class="particle" style="width: 12px; height: 12px; top: 100px; left: 150px;"></div>
        <div class="particle" style="width: 6px; height: 6px; top: 150px; left: 300px;"></div>
        <div class="particle" style="width: 10px; height: 10px; top: 70px; left: 500px;"></div>
        <div class="particle" style="width: 14px; height: 14px; top: 120px; left: 700px;"></div>
    </div>
</div>

<!-- Styles for Particles and Waves -->
<style>
    .wave-container {
        position: relative;
        overflow: hidden;
    }

    .particle {
        position: absolute;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 50%;
        animation: float 6s infinite ease-in-out;
        pointer-events: none;
        z-index: 2; /* Ensures particles appear above the wave */
    }

    @keyframes float {
        0% { transform: translateY(0) translateX(0); opacity: 1; }
        25% { transform: translateY(-20px) translateX(-10px); opacity: 0.8; }
        50% { transform: translateY(10px) translateX(15px); opacity: 0.6; }
        75% { transform: translateY(-15px) translateX(-15px); opacity: 0.8; }
        100% { transform: translateY(0) translateX(0); opacity: 1; }
    }
</style>

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
                <div class="mt-6 flex justify-center w-full md:justify-start">
                    <a href="https://wa.me/6285179709387"
                    id="joinButton"
                    class="bg-orange-500 text-white px-8 py-4 rounded-full shadow-lg hover:bg-orange-600 hover:shadow-xl transform hover:scale-95 transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-orange-400">
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
</div>

<!-- Testimonials Section -->
<div class="w-full main-carousel py-16 mt-16 bg-[#0E3995]">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
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
                <!-- Testimonial Info -->
                <div class="flex items-center gap-4 mb-6">
                    <!-- Avatar -->
                    <div class="w-16 h-16 rounded-full overflow-hidden border border-gray-300">
                        <img src="{{ Storage::url($testimonial->client->avatar) }}" alt="Client Avatar" class="object-cover w-full h-full">
                    </div>
                    <!-- Client Info -->
                    <div>
                        <p class="font-nunito font-bold text-lg text-[#0E3995]">{{ $testimonial->client->name }}</p>
                        <p class="text-sm text-[#ff9802]">{{ $testimonial->client->occupation }}</p>
                    </div>
                    <!-- WhatsApp Icon -->
                    <div class="ml-auto">
                        <img src="{{ asset('assets/icons/whatsapp.svg') }}" alt="WhatsApp" class="w-6 h-6 cursor-pointer" onclick="openModal({{ $loop->index }})">
                    </div>
                </div>

                <!-- Star Rating -->
                <div class="flex items-center mb-6">
                    @php
                        $randomStars = rand(4, 5); 
                    @endphp
                    @for($i = 0; $randomStars > $i; $i++)
                        <img src="{{ asset('assets/icons/Star-rating.svg') }}" class="w-5 h-5" alt="star">
                    @endfor
                </div>

                <!-- Testimonial Text -->
                <p class="text-gray-700 text-sm leading-6 mb-6">{{ Str::limit($testimonial->message, 150) }}
                    @if(strlen($testimonial->message) > 150)
                    <!-- Link to trigger modal -->
                    <a href="javascript:void(0);" class="text-[#0E3995] font-semibold" onclick="openModal('{{ $loop->index }}')">...Lihat selengkapnya</a>
                    @endif
                </p>
            </div>

            <!-- Full Testimonial Modal -->
            <div id="modal-{{ $loop->index }}" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                <div class="bg-white p-8 rounded-lg w-full md:w-2/3 lg:w-3/4 xl:w-2/3 2xl:w-1/2 max-h-screen overflow-y-auto relative">
                    <!-- Thumbnail Image -->
                    <div class="w-full h-auto mb-4">
                        <img src="{{ Storage::url($testimonial->thumbnail) }}" alt="Client Thumbnail" class="object-cover w-full h-full rounded-lg">
                    </div>
                    <button class="absolute top-4 right-4 text-gray-600 text-2xl" onclick="closeModal({{ $loop->index }})">&times;</button>
                </div>
            </div>
            @empty
            <p class="text-center text-white">Belum ada data terbaru</p>
            @endforelse
        </div>
    </div>
</div>




<!-- Principles Section -->
<div id="OurPrinciples" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">
    <div class="flex flex-col gap-[14px] items-center">
        <p class="badge w-fit bg-cp-pale-blue text-[#0e3995] p-[8px_16px] rounded-full uppercase font-nunito font-extrabold text-[46px]">
            Keunggulan Kami
        </p>
    </div>
    

    <div class="flex flex-wrap items-center gap-[20px] justify-center">
        @forelse ($principles as $principle)
        <div class="card w-[356.67px] flex flex-col items-center bg-white border border-[#E8EAF2] rounded-[20px] gap-[10px] overflow-hidden hover:border-cp-dark-blue hover:shadow-xl transition-all duration-300 min-h-[400px] mb-0 shadow-md p-6">
            <!-- Thumbnail Section with Responsive Dimensions -->
            <div class="thumbnail w-full max-h-[150px] sm:w-[200px] sm:h-[200px] flex items-center justify-center overflow-hidden mt-2">
                <img src="{{ Storage::url($principle->thumbnail) }}" class="object-cover w-full h-full" alt="thumbnails">
            </div>
    
            <!-- Content Section -->
            <div class="flex flex-col items-center text-center gap-[10px] flex-grow">
                <div class="flex flex-col gap-[5px] items-center">
                    <p class="title font-bold text-2xl text-[#0D3892]">{{ $principle->name }}</p>
                    <p class="text-base text-[#6B7280]">{{ $principle->subtitle }}</p>
                </div>
            </div>
        </div>
        @empty
        <p>Belum ada data terbaru</p>
        @endforelse
    </div>
    
    
</div>

<!-- Modal Script -->
{{-- @push('after-scripts')
<script>
    function openModal(index) {
        const modal = document.getElementById('modal-' + index);
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex'); // Ensure the modal is displayed using flex layout
        }
        
        // Close modal when clicking outside the content
        modal.addEventListener('click', function(event) {
            if (event.target === modal) {
                closeModal(index);
            }
        });
    }

    function closeModal(index) {
        const modal = document.getElementById('modal-' + index);
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex'); // Hide the modal
        }
    }
</script>
@endpush --}}

<!-- Footer Section -->

<footer class="w-full mt-10 bg-[#0E3995] text-white">
    <div class="container max-w-7xl mx-auto flex flex-col items-center justify-center py-10">
        <!-- Follow Us Section -->
        <p id="CompanyName" class="font-nunito font-bold text-lg mb-4">
            Ikuti Kami
        </p>
        <div class="flex items-center gap-6 mb-6">
            <a href="https://facebook.com" target="_blank">
                <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center">
                    <img src="{{ asset('assets/icons/facebook.svg') }}" class="w-5 h-5 object-contain" alt="Facebook">
                </div>
            </a>
            <a href="https://instagram.com" target="_blank">
                <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center">
                    <img src="{{ asset('assets/icons/instagram.svg') }}" class="w-5 h-5 object-contain" alt="Instagram">
                </div>
            </a>
            <a href="https://wa.me/your-number" target="_blank">
                <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center">
                    <img src="{{ asset('assets/icons/whatsapp.svg') }}" class="w-5 h-5 object-contain" alt="Instagram">
                </div>
            </a>
            <a href="https://youtube.com" target="_blank">
                <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center">
                    <img src="{{ asset('assets/icons/youtube.svg') }}" class="w-5 h-5 object-contain" alt="YouTube">
                </div>
            </a>
            <a href="https://tiktok.com" target="_blank">
                <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center">
                    <img src="{{ asset('assets/icons/tiktok.svg') }}" class="w-5 h-5 object-contain" alt="TikTok">
                </div>
            </a>
        </div>
        <!-- Copyright Section -->
        <p class="text-sm text-white">
            &copy; {{ date('Y') }} wilzio.com - All Rights Reserved
        </p>
    </div>
</footer>


@endsection

@push('after-scripts')
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
<script src="{{ asset('js/carousel.js') }}"></script>
<script src="{{ asset('js/accordion.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script>
    // Join Button hover and scale effect
    const joinButton = document.getElementById('joinButton');

    // Hover effect: Scale down to 90% when mouse enters
    joinButton.addEventListener('mouseenter', function() {
        joinButton.style.transition = 'transform 0.3s ease-in-out';
        joinButton.style.transform = 'scale(0.9)'; // Reduced scale for a smoother effect
    });

    // Revert to original size when mouse leaves
    joinButton.addEventListener('mouseleave', function() {
        joinButton.style.transform = 'scale(1)';
    });

    // On click, scale slightly down
    joinButton.addEventListener('mousedown', function() {
        joinButton.style.transform = 'scale(0.95)'; // Slight scale down on click
    });

    // On mouse up, return to the hover scale (if hovered)
    joinButton.addEventListener('mouseup', function() {
        joinButton.style.transform = 'scale(0.9)';
    });

    function openModal(index) {
        const modal = document.getElementById('modal-' + index);
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex'); // Ensure the modal is displayed using flex layout
        }
        
        // Close modal when clicking outside the content
        modal.addEventListener('click', function(event) {
            if (event.target === modal) {
                closeModal(index);
            }
        });
    }

    function closeModal(index) {
        const modal = document.getElementById('modal-' + index);
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex'); // Hide the modal
        }
    }
</script>
@endpush
