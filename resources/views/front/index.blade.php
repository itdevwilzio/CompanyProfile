@extends('front.layouts.app')

@section('content')
<div id="header" class="relative">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10 main-carousel">
        <x-navbar></x-navbar>
        <div class="carousel-container mt-20 relative overflow-hidden">
            <!-- Flickity Carousel -->
            <div class="carousel" 
                data-flickity='{ "wrapAround": true, "autoPlay": 4000, "prevNextButtons": true, "pageDots": true }'
                style="height: 400px;">
                
                @forelse ($hero_section as $hero)
                <div class="carousel-cell w-full h-full">
                    <div class="relative w-full h-full">
                        <img src="{{ Storage::url($hero->banner) }}"
                            srcset="{{ Storage::url($hero->banner) }} 1024w,
                                    {{ Storage::url($hero->banner) }} 640w"
                            sizes="(max-width: 768px) 640px, 1024px"
                            class="object-cover w-full h-full" alt="banner" loading="lazy">
                    </div>
                </div>
                @empty
                <div class="carousel-cell w-full h-full">
                    <div class="relative">
                        <img src="{{ asset('banners/banner.png') }}" class="object-cover w-full h-full" alt="No banners available">
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">
    <div class="flex flex-col md:flex-row items-center justify-between">
        <!-- Left Content -->
        <div class="md:w-1/2 text-center md:text-left">
            <h2 class="text-4xl font-bold text-white leading-tight">
                Buka Peluang Baru dengan Koneksi Internet Terbaik
            </h2>
            <p class="mt-4 text-lg text-white">
                Membangun Indonesia lebih maju dimulai dari akses internet yang merata.
            </p>
            <p class="mt-2 text-lg text-white">
                Ayo bergabung dengan WIJA BACKBONE dan jadilah bagian dari pergerakan untuk memperluas jangkauan internet cepat dan berkualitas.
            </p>
            <div class="mt-6">
                <a href="#"
                   class="bg-orange-500 text-white px-6 py-3 rounded-full shadow hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-400">
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
            sizes="(max-width: 768px) 640px, 1024px" alt="photo{{ $i + 1 }}" class="rounded-lg shadow-lg w-full h-auto object-cover">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div id="Testimonials" class="w-full flex flex-col gap-[50px] items-center mt-20 text-white">
    <div class="flex flex-col gap-[14px] items-center">
        <p class="badge w-fit bg-cp-pale-blue text-blue-700 p-[8px_16px] rounded-full uppercase font-bold text-4xl tracking-[1.2px]">
            KLIEN KAMI</p>
    </div>
    
    <div class="w-full main-carousel bg-blue-900 py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center text-yellow-400 mb-6">4.85 / 5 Rating Pelanggan</h2>
            <h3 class="text-3xl font-semibold text-center text-white mb-12">Apa Kata Mereka?</h3>

            <!-- Flickity Carousel -->
            <div class="carousel"
                data-flickity='{ "wrapAround": true, "autoPlay": 3000, "prevNextButtons": true, "pageDots": true }'>
                @forelse ($testimonials as $testimonial)
                <div class="carousel-cell bg-white p-6 rounded-lg shadow-lg relative">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 rounded-full overflow-hidden">
                            <img src="{{ Storage::url($testimonial->client->avatar) }}" alt="Client Avatar"
                                class="object-cover w-full h-full">
                        </div>
                        <div>
                            <p class="font-bold text-lg">{{ $testimonial->client->name }}</p>
                            <p class="text-sm text-gray-500">{{ $testimonial->client->occupation }}</p>
                        </div>
                        <div class="absolute top-4 right-4">
                            <img src="{{ asset('assets/icons/whatsapp.svg') }}" alt="WhatsApp" class="w-6 h-6">
                        </div>
                    </div>

                    <div class="flex items-center mb-4">
                        @for($i = 0; $i < 5; $i++)
                        <img src="{{ asset('assets/icons/Star-rating.svg') }}" class="w-6 h-6" alt="star">
                        @endfor
                    </div>

                    <p class="text-gray-700 text-sm leading-6 mb-6">{{ Str::limit($testimonial->message, 150) }}
                        @if(strlen($testimonial->message) > 150)
                        <a href="#" class="text-blue-700">...Lihat selengkapnya</a>
                        @endif
                    </p>
                </div>
                @empty
                <p class="text-center text-white">Belum ada data terbaru</p>
                @endforelse
            </div>
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

<!-- Footer Section -->
<footer class="relative w-full mt-20 overflow-hidden bg-cp-black">
    <div class="container max-w-[1130px] mx-auto flex flex-wrap gap-y-4 items-center justify-center pt-[100px] pb-[220px] relative z-10">
        <div class="flex flex-col gap-10 items-start">
            <div class="flex items-center gap-3">
                <div class="h-[43px] w-auto">
                    <img src="{{ asset('assets/logo/logo.svg') }}" class="object-contain w-full h-full" alt="Company logo">
                </div>
                <div class="flex flex-col">
                    <p id="CompanyName" class="font-extrabold text-xl leading-[30px] text-white">Wilzio</p>
                    <p id="CompanyTagline" class="text-sm text-cp-light-grey">Build Futuristic Dreams</p>
                </div>
            </div>

            <div class="flex items-center justify-between w-full max-w-[200px]">
                <a href="https://youtube.com" target="_blank">
                    <img src="{{ asset('assets/icons/youtube.svg') }}" class="w-6 h-6 object-contain" alt="YouTube">
                </a>
                <a href="https://wa.me/your-number" target="_blank">
                    <img src="{{ asset('assets/icons/whatsapp.svg') }}" class="w-6 h-6 object-contain" alt="WhatsApp">
                </a>
                <a href="https://facebook.com" target="_blank">
                    <img src="{{ asset('assets/icons/facebook.svg') }}" class="w-6 h-6 object-contain" alt="Facebook">
                </a>
                <a href="https://instagram.com" target="_blank">
                    <img src="{{ asset('assets/icons/instagram.svg') }}" class="w-6 h-6 object-contain" alt="Instagram">
                </a>
                <a href="https://tiktok.com" target="_blank">
                    <img src="{{ asset('assets/icons/tiktok.svg') }}" class="w-6 h-6 object-contain" alt="TikTok">
                </a>
            </div>
        </div>
    </div>
    <div class="absolute -bottom-[135px] w-full">
        <p class="font-extrabold text-[250px] leading-[375px] text-center text-white opacity-5">WILZIO</p>
    </div>
</footer>
@endsection

@push('after-scripts')
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
<script src="{{ asset('js/carousel.js') }}"></script>
<script src="{{ asset('js/accordion.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@endpush
