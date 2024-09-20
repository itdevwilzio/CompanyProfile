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
                        <!-- Banner Image -->
                        <div class="relative w-full h-full">
                            <img src="{{ asset(Storage::url($hero->banners)) }}"
                                 srcset="{{ asset(Storage::url($hero->banners)) }} 1024w,
                                         {{ asset(Storage::url('small/'.$hero->banners)) }} 640w"
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


</div>

    </div>

    <div id="Testimonials" class="w-full flex flex-col gap-[50px] items-center mt-20 text-white">
        <div class="flex flex-col gap-[14px] items-center">
            <p
                class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-4xl tracking-[1.2px]">
                SUCCESS CLIENTS</p>
        </div>
        {{-- <div class="w-full main-carousel">
            @forelse ($testimonials as $testimonial)
                <div
                    class="carousel-card container max-w-[1130px] w-full flex flex-wrap justify-between items-center lg:mx-[calc((100vw-1130px)/2)]">
                    <div class="testimonial-container flex flex-col gap-[112px] w-[565px]">
                        <div class="flex flex-col gap-[30px]">
                            <div class="overflow-hidden h-9">
                                <img src="{{ asset(Storage::url($testimonial->client->logo)) }}" class="object-contain"
                                    alt="icon">
                            </div>
                            <div class="relative pt-[27px] pl-[30px]">
                                <div class="absolute top-0 left-0">
                                    <img src="{{ asset('assets/icons/quote.svg') }}" alt="icon">
                                </div>
                                <p class="font-semibold text-2xl leading-[46px] relative z-10">{{ $testimonial->message }}
                                </p>
                            </div>
                            <div class="flex items-center justify-between pl-[30px]">
                                <div class="flex items-center gap-6">
                                    <div class="w-[60px] h-[60px] flex shrink-0 rounded-full overflow-hidden">
                                        <img src="{{ asset(Storage::url($testimonial->client->avatar)) }}"
                                            class="object-cover w-full h-full" alt="photo">
                                    </div>
                                    <div class="flex flex-col justify-center gap-1">
                                        <p class="font-bold">{{ $testimonial->client->name }}</p>
                                        <p class="text-sm text-cp-light-grey">{{ $testimonial->client->occupation }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-nowrap">
                                    <div class="flex w-6 h-6 shrink-0">
                                        <img src="{{ asset('assets/icons/Star-rating.svg') }}" alt="star">
                                    </div>
                                    <div class="flex w-6 h-6 shrink-0">
                                        <img src="{{ asset('assets/icons/Star-rating.svg') }}" alt="star">
                                    </div>
                                    <div class="flex w-6 h-6 shrink-0">
                                        <img src="{{ asset('assets/icons/Star-rating.svg') }}" alt="star">
                                    </div>
                                    <div class="flex w-6 h-6 shrink-0">
                                        <img src="{{ asset('assets/icons/Star-rating.svg') }}" alt="star">
                                    </div>
                                    <div class="flex w-6 h-6 shrink-0">
                                        <img src="{{ asset('assets/icons/Star-rating.svg') }}" alt="star">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center h-4 gap-2 carousel-indicator shrink-0">
                        </div>
                    </div>
                    <div class="testimonial-thumbnail w-[470px] h-[550px] rounded-[20px] overflow-hidden bg-[#D9D9D9]">
                        <img src="{{ asset(Storage::url($testimonial->thumbnail)) }}"
                            class="object-cover object-center w-full h-full" alt="thumbnail">
                    </div>
                </div>
            @empty
                <p>Belum ada data terbaru</p>
            @endforelse
        </div> --}}
        <div class="w-full main-carousel bg-blue-900 py-12">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <h2 class="text-4xl font-bold text-center text-yellow-400 mb-6">4.85 / 5 Rating Pelanggan</h2>
                <h3 class="text-3xl font-semibold text-center text-white mb-12">Apa Kata Mereka?</h3>
        
                <!-- Flickity Carousel -->
                <div class="carousel"
                    data-flickity='{ "wrapAround": true, "autoPlay": 3000, "prevNextButtons": true, "pageDots": true }'>
                    @forelse ($testimonials as $testimonial)
                    <div class="carousel-cell bg-white p-6 rounded-lg shadow-lg relative">
                        <!-- Client Info and Avatar -->
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-14 h-14 rounded-full overflow-hidden">
                                <img src="{{ asset(Storage::url($testimonial->client->avatar)) }}" alt="Client Avatar"
                                    class="object-cover w-full h-full">
                            </div>
                            <div>
                                <p class="font-bold text-lg">{{ $testimonial->client->name }}</p>
                                <p class="text-sm text-gray-500">{{ $testimonial->client->occupation }}</p>
                            </div>
                            <div class="absolute top-4 right-4">
                                <!-- WhatsApp Icon -->
                                <img src="{{ asset('assets/icons/whatsapp.svg') }}" alt="WhatsApp" class="w-6 h-6">
                            </div>
                        </div>
        
                        <!-- Stars Rating -->
                        <div class="flex items-center mb-4">
                            @for($i = 0; $i < 5; $i++)
                            <img src="{{ asset('assets/icons/Star-rating.svg') }}" class="w-6 h-6" alt="star">
                            @endfor
                        </div>
        
                        <!-- Testimonial Message -->
                        <p class="text-gray-700 text-sm leading-6 mb-6">{{ Str::limit($testimonial->message, 150) }}
                            @if(strlen($testimonial->message) > 150)
                            <a href="#" class="text-blue-500">...Lihat selengkapnya</a>
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

    <div id="OurPrinciples" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20 ">

            <div class="flex flex-col gap-[14px] items-center">
                <p
                    class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-4xl">
                    Keunggulan Kami</p>
            </div>

        <div class="flex flex-wrap items-center gap-[20px] justify-center"> <!-- Reduced gap between cards -->
            @forelse ($principles as $principle)
            <div class="card w-[356.67px] flex flex-col items-center bg-white border border-[#E8EAF2] rounded-[20px] gap-[5px] overflow-hidden hover:border-cp-dark-blue transition-all duration-300 min-h-[400px] mb-0"> <!-- Removed margin bottom -->
                <!-- Thumbnail section (image) with optimized sizing and margin -->
                <div class="thumbnail w-full max-h-[150px] flex items-center justify-center overflow-hidden mt-2"> <!-- Updated for max height -->
                    <img src="{{ asset(Storage::url($principle->thumbnail)) }}" class="object-contain max-w-full max-h-full" alt="thumbnails"> <!-- Ensure proper scaling and containment -->
                </div>
            
                <!-- Content section with reduced gap and optimized padding -->
                <div class="flex flex-col items-center text-center p-[10px_20px_20px_20px] gap-[5px] flex-grow"> <!-- Added top padding and ensured flex-grow -->
                    <div class="flex flex-col gap-[2px] items-center">
                        <p class="title font-bold text-xl leading-[24px] text-cp-dark-blue">{{ $principle->name }}</p> <!-- Adjusted line height -->
                        <p class="leading-[22px] text-cp-light-grey">{{ $principle->subtitle }}</p> <!-- Adjusted line height -->
                    </div>
                </div>
            </div>
            

            @empty
                <p>Belum ada data terbaru</p>
            @endforelse
        </div>
        
        
        </div>
    </div>

    <footer class="relative w-full mt-20 overflow-hidden bg-cp-black">
        <div
            class="container max-w-[1130px] mx-auto flex flex-wrap gap-y-4 items-center justify-center pt-[100px] pb-[220px] relative z-10">
            <div class="flex flex-col gap-10 items-start">
                <!-- Company Logo and Info -->
                <div class="flex items-center gap-3">
                    <div class="h-[43px] w-auto">
                        <img src="{{ asset('assets/logo/logo.svg') }}" class="object-contain w-full h-full" alt="Company logo">
                    </div>
                    <div class="flex flex-col">
                        <p id="CompanyName" class="font-extrabold text-xl leading-[30px] text-white">Wilzio</p>
                        <p id="CompanyTagline" class="text-sm text-cp-light-grey">Build Futuristic Dreams</p>
                    </div>
                </div>
            
                <!-- Social Media Icons -->
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
                        <img src="{{ asset('assets/icons/tiktok.svg') }}" class="w-6 h-6 object-contain" alt="Instagram">
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

    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script src="{{ asset('js/accordion.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- Initialize Swiper.js with Autoplay -->
    <script>
    </script>
@endpush
