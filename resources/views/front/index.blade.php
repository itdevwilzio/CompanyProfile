@extends('front.layouts.app')

@section('content')
<div id="header" class="relative">
    <div class="container max-w-[1130px] mx-auto relative pt-2 z-10 main-carousel">
        <x-navbar></x-navbar>
        <div class="carousel-container mt-4 relative overflow-hidden">
            <!-- Carousel Wrapper -->
            <div class="carousel w-full"
                data-flickity='{ "wrapAround": true, "autoPlay": 4000, "prevNextButtons": true, "pageDots": false, "pauseAutoPlayOnHover": true }'>
                @forelse ($hero_section as $hero)
                <div class="carousel-cell w-full h-[400px] md:h-[500px] lg:h-[600px]">
                    <div class="relative w-full h-full flex justify-center items-center">
                        <img src="{{ Storage::url($hero->banner) }}"
                            srcset="{{ Storage::url($hero->banner) }} 1024w,
                                    {{ Storage::url($hero->banner) }} 640w"
                            sizes="(max-width: 768px) 640px, 1024px"
                            class="object-cover w-[800px] h-auto rounded-lg" alt="Promo Banner: {{ $hero->description }}" loading="lazy">
                    </div>
                </div>
                @empty
                <!-- Fallback if no images are available -->
                <div class="carousel-cell w-full h-[250px] sm:h-[400px] md:h-[500px] lg:h-[600px]">
                    <div class="relative">
                        <img src="{{ asset('assets/banners/banner.png') }}" class="object-cover w-full h-full rounded-lg" alt="No banners available">
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div id="Bangun" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20 bg-white p-10 rounded-lg shadow-lg">
    <h2 class="font-permanent text-4xl font-bold text-[#0E3995] leading-tight"
    style="font-family: 'Permanent Marker', Sans-serif; font-size: 48px; font-weight: 900; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">
    Buka Peluang Baru dengan Koneksi Internet Terbaik
    </h2>
    <div class="flex flex-col items-center md:flex-row md:items-start justify-between">
        <!-- Left Content -->
        <div class="md:w-1/2 text-center">
            <p class="mt-4 text-lg text-[#0E3995]">
                Membangun Indonesia lebih maju dimulai dari akses internet yang merata.
            </p>
            <p class="mt-2 text-lg text-[#0E3995]">
                Ayo bergabung dengan WIJA BACKBONE dan jadilah bagian dari pergerakan untuk memperluas jangkauan internet cepat dan berkualitas.
            </p>
            <div class="mt-6">
                <a href="https://wa.me/6285179709387"
                   id="joinButton"
                   class="bg-orange-500 text-white px-6 py-3 rounded-full shadow-lg hover:bg-orange-600 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-400">
                    Mulai Bergabung
                </a>
            </div>
        </div>

        <!-- Right Content - Image Grid -->
        <div class="md:w-1/2 mt-8 md:mt-0">
            <div class="grid grid-cols-2 gap-4">
                @foreach($hero_section as $hero)
                <div class="col-span-1">
                    <img src="{{ Storage::url($hero->banner) }}" srcset="{{ Storage::url($hero->banner) }} 1024w,
                    {{ Storage::url($hero->banner) }} 640w"
                    sizes="(max-width: 768px) 640px, 1024px" alt="photo{{ $loop->iteration }}" class="rounded-lg shadow-lg w-full h-auto object-cover">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div id="Testimonials" class="w-full flex flex-col gap-[50px] items-center mt-20 text-white">
    <div class="flex flex-col gap-[14px] items-center">
        <p id="fadeInText" class="badge w-fit bg-cp-pale-blue text-blue-700 p-[8px_16px] rounded-full uppercase font-bold text-4xl tracking-[1.2px] opacity-0 transition-opacity duration-1000">
            KLIEN KAMI
        </p>
    </div>
    
    <div class="w-full main-carousel py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center text-yellow-400 mb-6">
                <span id="rating" class="rolling-number">4.85</span> / 5 Rating Pelanggan
            </h2>
            <h3 class="text-3xl font-semibold text-center text-white mb-12">Apa Kata Mereka?</h3>

            <!-- Flickity Carousel -->
            <div class="carousel" 
            data-flickity='{ "wrapAround": true, "autoPlay": 3000, "prevNextButtons": true, "pageDots": true, "groupCells": 3 }'>
           @forelse ($testimonials as $testimonial)
           <div class="carousel-cell bg-white p-6 rounded-lg shadow-lg relative mx-2 w-full sm:w-1/2 lg:w-1/3">
               <!-- Testimonial Info -->
               <div class="flex items-center gap-4 mb-4">
                   <div class="w-14 h-14 rounded-full overflow-hidden">
                       <img src="{{ Storage::url($testimonial->client->avatar) }}" alt="Client Avatar"
                           class="object-cover w-full h-full">
                   </div>
                   <div>
                       <p class="font-bold text-lg text-gray-500">{{ $testimonial->client->name }}</p>
                       <p class="text-sm text-gray-500">{{ $testimonial->client->occupation }}</p>
                   </div>
                        <!-- WhatsApp Icon with modal trigger -->
                        <div class="absolute top-4 right-4 z-50">
                            <img src="{{ asset('assets/icons/whatsapp.svg') }}" alt="WhatsApp" class="w-6 h-6 bg-green-500 rounded-full p-1 cursor-pointer" onclick="openModal({{ $loop->index }})">
                        </div>
               </div>
       
               <!-- Star Rating -->
               <div class="flex items-center mb-4">
                @php
                    $randomStars = rand(4, 5); 
                @endphp
                @for($i = 0; $randomStars > $i; $i++)
                    <img src="{{ asset('assets/icons/Star-rating.svg') }}" class="w-6 h-6" alt="star">
                @endfor
            </div>
    
               <!-- Testimonial Text -->
               <p class="text-gray-700 text-sm leading-6 mb-6">{{ Str::limit($testimonial->message, 150) }}
                @if(strlen($testimonial->message) > 150)
                <!-- Link to trigger modal -->
                <a href="javascript:void(0);" class="text-blue-700" onclick="openModal('{{ $loop->index }}')">...Lihat selengkapnya</a>
                @endif
                </p>
        </div>
    
            <!-- Full Testimonial Modal -->
            <div id="modal-{{ $loop->index }}" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                <div class="bg-white p-6 rounded-lg w-full md:w-2/3 lg:w-3/4 xl:w-2/3 2xl:w-1/2 max-h-screen overflow-y-auto relative">
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
        <p class="badge w-fit bg-cp-pale-blue text-blue-700 p-[8px_16px] rounded-full uppercase font-bold text-4xl">
            Keunggulan Kami</p>
    </div>

    <div class="flex flex-wrap items-center gap-[20px] justify-center">
        @forelse ($principles as $principle)
        <div class="card w-[356.67px] flex flex-col items-center bg-white border border-[#E8EAF2] rounded-[20px] gap-[5px] overflow-hidden hover:border-cp-dark-blue transition-all duration-300 min-h-[400px] mb-0">
            <div class="thumbnail w-full max-h-[150px] flex items-center justify-center overflow-hidden mt-2">
                <img src="{{ Storage::url($principle->thumbnail) }}" class="object-contain max-w-full max-h-full" alt="thumbnails">
            </div>
            <div class="flex flex-col items-center text-center p-[10px_20px_20px_20px] gap-[5px] flex-grow">
                <div class="flex flex-col gap-[2px] items-center">
                    <p class="title font-bold text-xl leading-[24px] text-cp-dark-blue">{{ $principle->name }}</p>
                    <p class="leading-[22px] text-cp-light-grey">{{ $principle->subtitle }}</p>
                </div>
            </div>
        </div>
        @empty
        <p>Belum ada data terbaru</p>
        @endforelse
    </div>
</div>

<!-- Modal Script -->
@push('after-scripts')
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
@endpush

<!-- Footer Section -->
<footer class="w-full mt-10 overflow-hidden bg-cp-black">
    <div class="container max-w-[1130px] mx-auto flex flex-wrap gap-y-2 items-center justify-center pt-[30px] pb-[40px] relative z-10">
        <div class="flex flex-col gap-4 items-start">
            <div class="flex items-center gap-2">
                <div class="h-[25px] w-auto">
                    <img src="{{ asset('assets/logo/logo.svg') }}" class="object-contain w-full h-full" alt="Company logo">
                </div>
                <div class="flex flex-col">
                    <p id="CompanyName" class="font-extrabold text-xl leading-[28px] text-white">Wilzio</p>
                    <p id="CompanyTagline" class="text-sm text-cp-light-grey">Build Futuristic Dreams</p>
                </div>
            </div>

            <div class="flex items-center justify-between w-full max-w-[180px]">
                <a href="https://youtube.com" target="_blank">
                    <img src="{{ asset('assets/icons/youtube.svg') }}" class="w-5 h-5 object-contain" alt="YouTube">
                </a>
                <a href="https://wa.me/your-number" target="_blank">
                    <img src="{{ asset('assets/icons/whatsapp.svg') }}" class="w-5 h-5 object-contain" alt="WhatsApp">
                </a>
                <a href="https://facebook.com" target="_blank">
                    <img src="{{ asset('assets/icons/facebook.svg') }}" class="w-5 h-5 object-contain" alt="Facebook">
                </a>
                <a href="https://instagram.com" target="_blank">
                    <img src="{{ asset('assets/icons/instagram.svg') }}" class="w-5 h-5 object-contain" alt="Instagram">
                </a>
                <a href="https://tiktok.com" target="_blank">
                    <img src="{{ asset('assets/icons/tiktok.svg') }}" class="w-5 h-5 object-contain" alt="TikTok">
                </a>
            </div>
            <div class="mt-2 text-center">
                <p class="text-xs text-gray-500">&copy; {{ date('Y') }} Wilzio Internet Provider. All rights reserved.</p>
            </div>
        </div>
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
</script>
@endpush
