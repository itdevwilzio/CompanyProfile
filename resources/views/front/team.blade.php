@extends('front.layouts.app')

@section('content')
    <!-- Header Section -->
    <div id="header" class="relative">
        <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
            <x-navbar></x-navbar>
        </div>
    </div>

    <!-- Born For Indonesia Section -->
    <section id="born-for-indonesia" class="w-full py-16">
        <div class="container max-w-[1130px] mx-auto flex flex-col lg:flex-row items-center gap-10">
            
            <!-- Text Section with Hover Effect -->
            <div class="w-full lg:w-1/2 text-white transition-all duration-300 hover:text-gray-300">
                <h2 class="font-bold text-4xl mb-4">Born For Indonesia</h2>
                <p class="text-lg leading-7 mb-4">
                    PT Pasifik Wija Teknologi adalah perusahaan teknologi yang didirikan oleh putra-putri Kalimantan Utara dengan tujuan membawa manfaat bagi masyarakat Indonesia, khususnya di daerah terpencil yang belum terjangkau oleh penyedia layanan lainnya.
                </p>
            </div>
    
            <!-- Image Section with Hover Effect -->
            <div class="w-full lg:w-1/2 flex justify-center">
                <img src="{{ asset('assets/teams/athletic.png') }}" 
                    class="object-contain w-full rounded-lg transition-transform duration-300 hover:scale-105" 
                    alt="Telecom Tower">
            </div>
        </div>
    </section>

    <!-- Identitas Produk Section -->
    <section id="product-identity" class="w-full py-16">
        <div class="container max-w-[1130px] mx-auto flex flex-col lg:flex-row items-center gap-10">
            
            <!-- Logo Section with Hover Effect -->
            <div class="relative w-full lg:w-1/2 text-white flex justify-center bg-white p-4 rounded-lg">
                <img src="{{ asset('assets/teams/logo-Biru-V2.png') }}" 
                     class="object-contain w-full rounded-lg transition-transform duration-300 hover:scale-105 shadow-lg filter brightness-150" 
                     alt="Wija Backbone Logo">
            </div>
            
            <!-- Description Section -->
            <div class="w-full lg:w-1/2 text-white lg:text-right">
                <h2 class="font-bold text-4xl mb-4">Identitas Produk</h2>
                <p class="text-lg leading-7 mb-4">
                    WIJA BACKBONE merupakan produk layanan internet utama yang kami tawarkan, dengan menggunakan teknologi terkini, menyediakan koneksi internet cepat, serta harga yang terjangkau.
                </p>
                
                <!-- Dropdown Button with Hover Effect -->
                <div x-data="{ open: false }" class="bg-white text-blue-900 p-4 rounded-lg shadow-md ml-auto transition-transform duration-300 hover:scale-105 hover:bg-blue-100">
                    <div class="flex items-center justify-between cursor-pointer" @click="open = !open" @click.away="open = false">
                        <h3 class="font-bold text-lg">Arti WIJA BACKBONE ?</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  :class="{'transform rotate-180': open}" d="M5 15l7-7 7 7" />
                        </svg>
                    </div>
                    
                    <div x-show="open" class="mt-4 transition-all duration-300 ease-in-out">
                        <p class="text-sm mb-2">
                            <strong>"WIJA"</strong> berasal dari bahasa Sanskerta yang artinya benih yang berpotensi menjadi luar biasa kuat dan besar di masa depan.
                        </p>
                        <p class="text-sm mb-2">
                            <strong>"BACKBONE"</strong> dalam jaringan adalah pondasi vital yang mendukung koneksi dan akses, mengatur lalu lintas data, dan memastikan kinerja jaringan yang lancar dan andal.
                        </p>
                        <p class="text-sm">
                            Jadi Arti <strong>"WIJA BACKBONE"</strong> adalah sebuah kekuatan dan potensi, untuk menjadi pusat dari jaringan Internet yang tumbuh dan berkembang di masa depan, dengan dasar yang kokoh dan inovatif untuk menjamin kinerja jaringan yang optimal dan terpercaya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- APJII Certification Section -->
    <section id="apjii-registration" class="w-full py-16">
        <div class="container max-w-[1130px] mx-auto flex flex-col lg:flex-row items-center gap-10">
            <!-- Text Section with Hover Effect -->
            <div class="w-full lg:w-1/2 text-white transition-all duration-300 hover:text-gray-300">
                <h2 class="font-bold text-4xl mb-4">Resmi Terdaftar di APJII</h2>
                <p class="text-lg leading-7 mb-4">
                    Kami telah terdaftar secara resmi sebagai Penyedia Layanan Internet (Internet Service Provider/ISP) di Asosiasi Penyelenggara Jasa Internet Indonesia (APJII). Dengan komitmen yang kuat untuk memberikan layanan internet terbaik, kami bertekad untuk mempercepat kemajuan teknologi di seluruh Indonesia.
                </p>
            </div>
            <!-- Image Section with Hover Effect -->
            <div class="w-full lg:w-1/2 flex justify-center">
                <img src="{{ asset('assets/teams/APJII.png') }}" 
                     class="object-contain w-full rounded-lg transition-transform duration-300 hover:scale-105" 
                     alt="APJII Logo">
            </div>
        </div>
    </section>

    <!-- Super Team Section -->
    <section id="super-team" class="w-full py-16">
        <div class="container max-w-[1130px] mx-auto flex flex-col lg:flex-row items-center gap-10">
            <!-- Image Section with Hover Effect -->
            <div class="w-full lg:w-1/2 flex justify-center">
                <img src="{{ asset('assets/teams/Thank-min.png') }}" 
                    class="object-contain w-full rounded-lg transition-transform duration-300 hover:scale-105" 
                    alt="Super Team Image">
            </div>
            <!-- Text Section with Hover Effect -->
            <div class="w-full lg:w-1/2 text-white lg:text-right transition-all duration-300 hover:text-gray-300">
                <h2 class="font-bold text-4xl mb-4">Super Team</h2>
                <p class="text-lg leading-7 mb-4">
                    Tim kami yang solid dan profesional menggunakan teknologi terkini untuk memberikan layanan internet yang berkualitas dan handal bagi pelanggan di seluruh Indonesia. Kami berfokus pada inovasi dan kepuasan pelanggan untuk memastikan setiap layanan yang kami berikan memenuhi standar tertinggi.
                </p>
                <p class="text-lg leading-7">
                    Kami terus melakukan pengembangan dan inovasi untuk memenuhi kebutuhan pelanggan, serta memegang teguh nilai-nilai profesionalisme, integritas, dan kejujuran dalam menjalankan bisnis. Komitmen ini menjadi landasan utama kami dalam memberikan layanan terbaik dan membangun kepercayaan jangka panjang dengan pelanggan.
                </p>
            </div>
        </div>
    </section>

    <!-- Teams Section -->
    <section id="teams" class="w-full py-16">
        <div class="container max-w-[1130px] mx-auto flex flex-col items-center gap-10">
            <h2 class="font-bold text-4xl text-white text-center">Staff Profesional Kami <br> Siap Melayani Anda</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
                @forelse ($teams as $team)
                    <div class="border border-[#E8EAF2] hover:border-white hover:bg-gray-700 hover:scale-105 transition-all duration-300 rounded-lg p-5 text-center text-white">
                        <!-- Ensuring the image remains circular and doesn't stretch -->
                        <img src="{{ asset(Storage::url($team->avatar)) }}" 
                            class="w-[100px] h-[100px] rounded-full mx-auto mb-4 object-cover transition-transform duration-300 hover:scale-110" 
                            alt="{{ $team->name }}">
                        <h3 class="font-bold text-xl">{{ $team->name }}</h3>
                        <p>{{ $team->occupation }}</p>
                        <p class="text-sm">{{ $team->location }}</p>
                    </div>
                @empty
                    <p class="text-white">No team members available</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer Section -->
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
                <div class="flex items-center justify-between w-full max-w-[300px]">
                    <a href="https://youtube.com" target="_blank">
                        <img src="{{ asset('assets/icons/youtube.svg') }}" class="w-6 h-6 object-contain" alt="YouTube">
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
                <div class="mt-4 text-center">
                    <p class="text-xs text-gray-500">&copy; {{ date('Y') }} Wilzio Internet Provider. All rights reserved.</p>
                </div>
            </div>
        </div>
        <div class="absolute -bottom-[135px] w-full">
            <p class="font-extrabold text-[250px] leading-[375px] text-center text-white opacity-5">WILZIO</p>
        </div>
    </footer>
@endsection