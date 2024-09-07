@extends('front.layouts.app')
{{-- @section('content')
    <div id="header" class="bg-[#F6F7FA] relative overflow-hidden">
        <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
            <x-navbar></x-navbar>
            @forelse ($hero_section as $hero)
                <input type="hidden" name="path_video" id="path_video" value="{{ $hero->path_video }}">
                <div id="Hero" class="flex flex-col gap-[30px] mt-20 pb-20">
                    <div class="flex items-center bg-white p-[8px_16px] gap-[10px] rounded-full w-fit">
                        <div class="flex w-5 h-5 overflow-hidden shrink-0">
                            <img src="{{ asset('assets/icons/crown.svg') }}" class="object-contain" alt="icon">
                        </div>
                        <p class="text-sm font-semibold">{{ $hero->achievement }}</p>
                    </div>
                    <div class="flex flex-col gap-[10px]">
                        <h1 class="font-extrabold text-[50px] leading-[65px] max-w-[536px]">{{ $hero->heading }}</h1>
                        <p class="text-cp-light-grey leading-[30px] max-w-[437px]">{{ $hero->subheading }}</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <a href=""
                            class="bg-cp-dark-blue p-5 w-fit rounded-xl hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300 font-bold text-white">Explore
                            Now</a>
                        <button class="bg-cp-black p-5 w-fit rounded-xl font-bold text-white flex items-center gap-[10px]"
                            onclick="{modal.show()}">
                            <div class="flex w-6 h-6 overflow-hidden shrink-0">
                                <img src="{{ asset('assets/icons/play-circle.svg') }}" class="object-contain w-full h-full"
                                    alt="icon">
                            </div>
                            <span>Watch Video</span>
                        </button>
                    </div>
                </div>
        </div>
        <div class="absolute w-[43%] h-full top-0 right-0 overflow-hidden z-0">
            <img src="{{ asset(Storage::url($hero->banner)) }}" class="object-cover w-full h-full" alt="banner">
        </div>
    @empty
        @endforelse
    </div>




    {{-- <div id="Clients" class="container max-w-[1130px] mx-auto flex flex-col justify-center text-center gap-5 mt-20">
        <h2 class="text-lg font-bold">Trusted by 500+ Top Leaders Worldwide</h2>
        <div class="flex flex-wrap justify-center gap-5 logo-container">
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-54.svg') }}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-52.svg') }}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-55.svg') }}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-44.svg') }}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-51.svg') }}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-55.svg') }}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-52.svg') }}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-54.svg') }}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-51.svg') }}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div id="OurPrinciples" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">
        <div class="flex items-center justify-between">
            <div class="flex flex-col gap-[14px]">
                <p
                    class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">
                    OUR PRINCIPLES</p>
                <h2 class="font-bold text-4xl leading-[45px]">We Might Best Choice <br> For Your Company</h2>
            </div>
            <a href="" class="bg-cp-black p-[14px_20px] w-fit rounded-xl font-bold text-white">Explore More</a>
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
                        <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
                            <img src="{{ asset(Storage::url($principle->icon)) }}" class="object-contain w-full h-full"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="title font-bold text-xl leading-[30px]">{{ $principle->name }}</p>
                            <p class="leading-[30px] text-cp-light-grey">{{ $principle->subtitle }}</p>
                        </div>
                        <a href="" class="font-semibold text-cp-dark-blue">Learn More</a>
                    </div>
                </div>
            @empty
                <p>Belum ada data terbaru</p>
            @endforelse
        </div>
    </div> --}}
    {{-- <div id="Stats" class="w-full mt-20 bg-cp-black">
        <div class="container max-w-[1000px] mx-auto py-10">
            <div class="flex flex-wrap items-center justify-between p-[10px]">
                @forelse ($statistics as $statistic)
                    <div class="card w-[200px] flex flex-col items-center gap-[10px] text-center">
                        <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
                            <img src="{{ asset(Storage::url($statistic->icon)) }}" class="object-contain w-full h-full"
                                alt="icon">
                        </div>
                        <p class="text-cp-pale-orange font-bold text-4xl leading-[54px]">{{ $statistic->goal }}</p>
                        <p class="text-cp-light-grey">{{ $statistic->name }}</p>
                    </div>
                @empty
                    <p>Belum ada data terbaru</p>
                @endforelse
            </div>
        </div>
    </div> --}}


    <div id="Products" class="container max-w-[1130px] mx-auto flex flex-col gap-20 mt-20">
        <div class="container mx-auto px-4">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($products as $product)
                    <div class="product flex flex-col items-center bg-white shadow-lg rounded-lg overflow-hidden">
                        <!-- Adjusted the width and height to make the images smaller squares -->
                        <div class="w-[100px] h-[100px] md:w-[150px] md:h-[150px] flex overflow-hidden">
                            <img src="{{ asset(Storage::url($product->thumbnail)) }}"
                                class="object-cover w-full h-full rounded-lg"
                                alt="{{ $product->name }}"
                                loading="lazy"> <!-- Lazy loading the image -->
                        </div>
                        <div class="flex flex-col gap-4 p-4 text-center">
                            <p class="badge bg-cp-pale-blue text-cp-light-blue p-2 rounded-full uppercase font-bold text-sm">
                                {{ $product->tagline }}
                            </p>
                            <h2 class="font-bold text-lg">{{ $product->name }}</h2>
                            <p class="text-cp-light-grey">{{ $product->about }}</p>
                            <a href="{{ route('front.appointment') }}"
                            class="bg-cp-dark-blue p-3 w-full rounded-xl hover:shadow-lg transition-all duration-300 font-bold text-white">
                                Book Appointment
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center">Belum ada data terbaru</p>
                @endforelse
            </div>
        </div>
    </div>

        <!-- Product Modal -->
    <div id="productModal" class="fixed inset-0 hidden z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 text-center">
            <div class="relative bg-white rounded-lg shadow-xl w-full max-w-lg p-6 text-left">
                <!-- Modal close button -->
                <button id="closeModal" class="absolute top-0 right-0 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <!-- Modal content -->
                <div id="modalContent" class="flex flex-col gap-4">
                    <div class="w-full h-[150px] overflow-hidden rounded-lg">
                        <img id="modalThumbnail" src="" alt="Product Image" class="object-cover w-full h-full">
                    </div>
                    <h2 id="modalName" class="text-xl font-bold"></h2>
                    <p id="modalAbout" class="text-gray-700"></p>
                </div>
            </div>
        </div>
    </div>

      <!-- Modal overlay -->
    <div id="modalOverlay" class="hidden fixed inset-0 bg-black opacity-50 z-40"></div>


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

            {{-- <div class="flex flex-wrap gap-[50px]">
                <div class="flex flex-col w-[200px] gap-3">
                    <p class="text-lg font-bold text-white">Products</p>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">General
                        Contract</a>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">Building
                        Assessment</a>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">3D Paper
                        Builder</a>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">Legal
                        Constructions</a>
                </div>
                <div class="flex flex-col w-[200px] gap-3">
                    <p class="text-lg font-bold text-white">About</p>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">We’re
                        Hiring</a>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">Our Big
                        Purposes</a>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">Investor
                        Relations</a>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">Media
                        Press</a>
                </div>
                <div class="flex flex-col w-[200px] gap-3">
                    <p class="text-lg font-bold text-white">Useful Links</p>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">Privacy
                        & Policy</a>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">Terms &
                        Conditions</a>
                    <a href="contact.html" class="transition-all duration-300 text-cp-light-grey hover:text-white">Contact
                        Us</a>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">Download
                        Template</a>
                </div>
            </div> --}}
        </div>
        <div class="absolute -bottom-[135px] w-full">
            <p class="font-extrabold text-[250px] leading-[375px] text-center text-white opacity-5">WILZIO</p>
        </div>
    </footer>



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
    <script>
        const products = document.querySelectorAll('.product');
        const modal = document.getElementById('productModal');
        const modalOverlay = document.getElementById('modalOverlay');
        const modalName = document.getElementById('modalName');
        const modalAbout = document.getElementById('modalAbout');
        const modalThumbnail = document.getElementById('modalThumbnail');
        const closeModal = document.getElementById('closeModal');

        // Open modal when a product is clicked
        products.forEach(product => {
            product.addEventListener('click', function() {
                const productName = this.getAttribute('data-product-name');
                const productAbout = this.getAttribute('data-product-about');
                const productThumbnail = this.getAttribute('data-product-thumbnail');

                // Set modal content
                modalName.textContent = productName;
                modalAbout.textContent = productAbout;
                modalThumbnail.src = productThumbnail;

                // Show modal and overlay
                modal.classList.remove('hidden');
                modalOverlay.classList.remove('hidden');
            });
        });

        // Close modal
        closeModal.addEventListener('click', function() {
            modal.classList.add('hidden');
            modalOverlay.classList.add('hidden');
        });

        // Close modal when clicking outside the modal
        modalOverlay.addEventListener('click', function() {
            modal.classList.add('hidden');
            modalOverlay.classList.add('hidden');
        });
    </script>
@endpush
