@extends('front.layouts.app')
@section('content')
    <div id="header" class="relative overflow-hidden">
        <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
            <x-navbar></x-navbar>

            <!-- Swiper Wrapper for Banner Carousel -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @forelse ($hero_section as $hero)
                        <div class="swiper-slide">
                            <input type="hidden" name="path_video" id="path_video" value="{{ $hero->path_video }}">

                            <!-- Banner Image -->
                            <div class="relative">
                                <img src="{{ asset(Storage::url($hero->banner)) }}"
                                    srcset="{{ asset(Storage::url($hero->banner)) }} 1024w,
                                            {{ asset(Storage::url('small/'.$hero->banner)) }} 640w"
                                    sizes="(max-width: 768px) 640px, 1024px"
                                    class="object-cover w-full h-full" alt="banner">
                            </div>

                            <!-- Optional Hero Section Text -->
                            <div class="absolute bottom-10 left-10">
                                <h1 class="font-extrabold text-2xl md:text-4xl lg:text-5xl">{{ $hero->heading }}</h1>
                                <p class="mt-2 max-w-sm md:max-w-md lg:max-w-lg">{{ $hero->subheading }}</p>
                            </div>
                        </div>
                    @empty
                        {{-- <p>No hero sections available</p> --}}
                    @endforelse
                </div>

                <!-- Swiper Pagination (dots) -->
                <div class="swiper-pagination"></div>

                <!-- Swiper Navigation (arrows) -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    <div id="Testimonials" class="w-full flex flex-col gap-[50px] items-center mt-20 text-white">
        <div class="flex flex-col gap-[14px] items-center">
            <p
                class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">
                SUCCESS CLIENTS</p>
            <h2 class="font-bold text-4xl leading-[45px] text-center">Our Satisfied Clients<br>From Worldwide Company
            </h2>
        </div>
        <div class="w-full main-carousel">
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
        </div>
    </div>

    <div id="Testimonials" class="w-full flex flex-col gap-[50px] items-center mt-20 text-white">
        <div class="flex flex-col gap-[14px] items-center">
            <p
                class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">
                OUR PRINCIPLES</p>
            <h2 class="font-bold text-4xl leading-[45px] text-center">We Might Best Choice<br>From Your Company
            </h2>
        </div>
        <div class="flex flex-wrap items-center gap-[30px] justify-center">
            @forelse ($principles as $principle)
                <div
                    class="card w-[356.67px] flex flex-col bg-white border border-[#E8EAF2] rounded-[20px] gap-[30px] overflow-hidden hover:border-cp-dark-blue transition-all duration-300">
                    <div class="thumbnail h-[200px] flex shrink-0 overflow-hidden">
                        <img src="{{ asset(Storage::url($principle->thumbnail)) }}"
                            class="object-cover object-center w-full h-full" alt="thumbnails">
                    </div>
                    <div class="flex flex-col p-[0_30px_30px_30px] gap-5">
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-cp-dark-blue item-center">{{ $principle->name }}</p>
                            <p class="leading-[30px] text-cp-light-grey">{{ $principle->subtitle }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p>Belum ada data terbaru</p>
            @endforelse
        </div>
    </div>


    <footer class="relative w-full mt-20 overflow-hidden bg-cp-black">
        <div
            class="container max-w-[1130px] mx-auto flex flex-wrap gap-y-4 items-center justify-center pt-[100px] pb-[220px] relative z-10">
            <div class="flex flex-col gap-10 items-start">
                <!-- Company Logo and Info -->
                <div class="flex items-center gap-3">
                    <div class="flex shrink-0 h-[43px] overflow-hidden">
                        <img src="{{ asset('assets/logo/logo.svg') }}" class="object-contain w-full h-full" alt="Company logo">
                    </div>
                    <div class="flex flex-col">
                        <p id="CompanyName" class="font-extrabold text-xl leading-[30px] text-white">Wilzio</p>
                        <p id="CompanyTagline" class="text-sm text-cp-light-grey">Build Futuristic Dreams</p>
                    </div>
                </div>

                <!-- Social Media Icons -->
                <div class="flex items-center justify-center gap-4">
                    <a href="https://youtube.com" target="_blank">
                        <div class="flex w-6 h-6 overflow-hidden shrink-0">
                            <img src="{{ asset('assets/icons/youtube.svg') }}" class="object-contain w-full h-full" alt="YouTube">
                        </div>
                    </a>
                    <a href="https://wa.me/your-number" target="_blank">
                        <div class="flex w-6 h-6 overflow-hidden shrink-0">
                            <img src="{{ asset('assets/icons/whatsapp.svg') }}" class="object-contain w-full h-full" alt="WhatsApp">
                        </div>
                    </a>
                    <a href="https://facebook.com" target="_blank">
                        <div class="flex w-6 h-6 overflow-hidden shrink-0">
                            <img src="{{ asset('assets/icons/facebook.svg') }}" class="object-contain w-full h-full" alt="Facebook">
                        </div>
                    </a>
                    <a href="https://instagram.com" target="_blank">
                        <div class="flex w-6 h-6 overflow-hidden shrink-0">
                            <img src="{{ asset('assets/icons/instagram.svg') }}" class="object-contain w-full h-full" alt="Instagram">
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <div class="absolute -bottom-[135px] w-full">
            <p class="font-extrabold text-[250px] leading-[375px] text-center text-white opacity-5">WILZIO</p>
        </div>
    </footer>
    {{-- <div id="video-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-h-full p-4 lg:w-1/2">
            <!-- Modal content -->
            <div class="relative bg-white rounded-[20px] overflow-hidden shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                    <h3 class="text-xl font-semibold text-cp-black">
                        Company Profile Video
                    </h3>
                    <button type="button"
                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto"
                        onclick="{modal.hide()}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="">
                    <!-- video src added from the js script (modal-video.js) to prevent video running in the backgroud -->
                    <iframe id="videoFrame" class="aspect-[16/9]" width="100%" src=""
                        title="Demo Project Laravel Portfolio" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@push('after-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script src="{{ asset('js/accordion.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="{{ asset('js/modal-video.js') }}"></script>

    <!-- Initialize Swiper.js with Autoplay -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            loop: true,  // Enable infinite looping of the banners
            autoplay: {
                delay: 5000,  // Set the delay to 5000 milliseconds (5 seconds)
                disableOnInteraction: false,  // Keep autoplay enabled after user interaction
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,  // Make the pagination dots clickable
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endpush
