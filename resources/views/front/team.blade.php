@extends('front.layouts.app')

@section('content')
    <!-- Header Section -->
    <div id="header" class="relative">
        <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
            <x-navbar></x-navbar>
            
            <h2 class="font-nunito font-bold text-white text-4xl text-center mb-12">
                Tentang Kami
            </h2>
        </div>
    </div>

    <!-- Born For Indonesia Section -->
    <section id="born-for-indonesia" class="w-full py-16 bg-[#0E3995] relative overflow-hidden">
        <div class="container max-w-[1140px] mx-auto flex flex-col lg:flex-row items-center gap-10">

            
            <!-- Text Section -->
            <div class="w-full lg:w-1/2 text-white lg:pr-10">
                
                <h2 class="font-nunito font-bold text-4xl mb-6">
                    Born For Indonesia
                </h2>
                <p class="font-roboto text-base leading-7 mb-8">
                    PT Pasifik Wija Teknologi adalah perusahaan teknologi yang didirikan oleh putra-putri Kalimantan Utara dengan tujuan membawa manfaat bagi masyarakat Indonesia, khususnya di daerah terpencil yang belum terjangkau oleh penyedia layanan lainnya.
                </p>
            </div>

            <!-- Image Section -->
            <div class="w-full lg:w-1/2 flex justify-center lg:justify-end relative">
                <div class="rounded-xl overflow-hidden shadow-2xl transform transition-transform duration-300 hover:scale-105">
                    <img src="{{ asset('assets/teams/athletic.png') }}" 
                        class="object-cover w-full h-full"
                        alt="Telecom Tower">
                </div>
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
                <div x-data="{ open: false }" class="bg-[#0E3995] text-white p-6 rounded-lg shadow-lg transition-transform duration-300 hover:scale-105 hover:bg-[#0C357D]">
                    <!-- Accordion Header -->
                    <div class="flex items-center justify-between cursor-pointer" @click="open = !open" @click.away="open = false">
                        <div class="flex items-center gap-2">
                            <!-- Icon (Conditional Rendering) -->
                            <template x-if="!open">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a10 10 0 100 20 10 10 0 000-20zM8 12h8m-4-4v8" />
                                </svg>
                            </template>
                            <template x-if="open">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 2a6 6 0 00-6 6c0 2.22 1.21 4.15 3 5.19V15a1 1 0 001 1h4a1 1 0 001-1v-1.81a6.978 6.978 0 003-5.19 6 6 0 00-6-6zm-1 13h2v2h-2v-2z"/>
                                </svg>
                                
                            </template>
                            <!-- Title -->
                            <h3 class="font-bold text-lg">Arti WIJA BACKBONE ?</h3>
                        </div>
                        <!-- Arrow Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white transform transition-transform duration-300" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                    </div>
                
                    <!-- Accordion Content -->
                    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-2" class="mt-4">
                        <p class="text-sm mb-4">
                            <strong>"WIJA"</strong> berasal dari bahasa Sanskerta yang artinya benih yang berpotensi menjadi luar biasa kuat dan besar di masa depan.
                        </p>
                        <p class="text-sm mb-4">
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