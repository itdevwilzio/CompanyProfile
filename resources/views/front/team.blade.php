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
    <section id="born-for-indonesia" class="w-full py-16 bg-primary relative overflow-hidden">
        <div class="container max-w-[1140px] mx-auto flex flex-col lg:flex-row items-center gap-10">
            @forelse ($abouts as $about)
            
            <!-- Text Section -->
            <div class="w-full lg:w-1/2 text-white lg:pr-10  transition-all duration-300 hover:text-black">
                <h2 class="font-nunito font-bold text-4xl mb-6">
                    {{ $about->name }}
                </h2>
                <p class="font-nunito text-base leading-7 mb-8">
                    {{ $about->description }}
                </p>
            </div>

            <!-- Image Section -->
            <div class="w-full lg:w-1/2 flex justify-center lg:justify-end relative">
                <div class="rounded-xl overflow-hidden shadow-2xl transform transition-transform duration-300 hover:scale-105">
                    <img src="{{ asset(Storage::url($about->thumbnail)) }}" 
                        class="object-cover w-full h-full"
                        alt="{{ $about->name }}">
                </div>
            </div>
            @empty
                <p class="text-white">No about sections available</p>
            @endforelse
        </div>
    </section>


    <!-- Identitas Produk Section -->
    <section id="product-identity" class="w-full py-16">
        <div class="container max-w-[1130px] mx-auto flex flex-col lg:flex-row items-center lg:items-start gap-10">
            
            <!-- Logo Section with Hover Effect -->
            <div class="relative w-full lg:w-1/2 text-white flex justify-center items-center bg-white p-4 rounded-lg">
                <img src="{{ asset('assets/teams/blue-rounded.png') }}" 
                class="object-contain w-full rounded-lg transition-transform duration-300 hover:scale-105 shadow-custom filter brightness-150" 
                alt="Wija Backbone Logo">
            </div>
            
            <!-- Description Section -->
            <div class="w-full lg:w-1/2 text-primary lg:text-left flex flex-col justify-center transition-all duration-300 hover:text-black">
                <h2 class="font-nunito font-bold text-4xl mb-2">Identitas Produk</h2>
                <p class="text-lg leading-7 mb-2">
                    WIJA BACKBONE merupakan produk layanan internet utama yang kami tawarkan, dengan menggunakan teknologi terkini, menyediakan koneksi internet cepat, serta harga yang terjangkau.
                </p>
                
                <!-- Dropdown Button with Hover Effect -->
                <div x-data="{ open: false }" class="bg-white text-blue-900 p-6 rounded-lg shadow-lg transition-transform duration-300 hover:scale-105 hover:bg-[#E8F0FD]">
                    <!-- Accordion Header -->
                    <div class="flex items-center justify-between cursor-pointer" @click="open = !open" @click.away="open = false">
                        <div class="flex items-center gap-2">
                            <!-- Icon (Conditional Rendering) -->
                            <template x-if="!open">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-900 transform transition-transform duration-300" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

    <section id="certification" class="w-full py-16 bg-primary relative overflow-hidden">
        <div class="container max-w-[1140px] mx-auto flex flex-col lg:flex-row items-center gap-10">
            @forelse ($certifications as $certification)
                <!-- Text Section -->
                <div class="w-full lg:w-1/2 text-white lg:pr-10 transition-all duration-300 hover:text-black">
                    <h2 class="font-nunito font-bold text-4xl mb-6">
                        {{ $certification->title }}
                    </h2>
                    <p class="font-nunito text-base leading-7 mb-8">
                        {{ $certification->description }}
                    </p>
                </div>

                <!-- Image Section -->
                <div class="w-full lg:w-1/2 flex justify-center lg:justify-end relative">
                    <div class="rounded-xl overflow-hidden shadow-2xl transform transition-transform duration-300 hover:scale-105">
                        <img src="{{ Storage::url($certification->logo) }}" 
                             class="object-cover w-full h-full"
                             alt="{{ $certification->title }}">
                    </div>
                </div>
            @empty
                <p class="text-white">No certifications available</p>
            @endforelse
        </div>
    </section>

    <!-- Super Team Section -->

    <section id="super-team" class="w-full py-16">
        <div class="container max-w-[1130px] mx-auto flex flex-col lg:flex-row items-center gap-10">
            @forelse($super_teams as $super_team)
                <!-- Image Section with Hover Effect -->
                <div class="w-full lg:w-1/2 flex justify-center">
                    @if($super_team->image)
                        <img src="{{ Storage::url($super_team->image) }}" 
                                class="object-contain w-full rounded-lg transition-transform duration-300 hover:scale-105 shadow-custom" 
                                alt="{{ $super_team->title }}">
                    @else
                        <img src="{{ asset('assets/teams/Thank-min.png') }}" 
                                class="object-contain w-full rounded-lg transition-transform duration-300 hover:scale-105 shadow-custom" 
                                alt="Super Team Image">
                    @endif
                </div>

                <!-- Text Section with Hover Effect -->
                <div class="w-full lg:w-1/2 text-primary lg:text-right transition-all duration-300 hover:text-black">
                    <h2 class="font-nunito font-bold text-4xl mb-4">{{ $super_team->title }}</h2>
                    <p class="text-lg leading-7 mb-4">
                        {{ $super_team->description }}
                    </p>
                    <p class="text-lg leading-7">
                        {{ $super_team->additional_info }}
                    </p>
                </div>
            @empty
                <!-- Display this if there are no super teams -->
                <div class="w-full text-center text-white">
                    <h2 class="font-nunito font-bold text-4xl mb-4">Super Team</h2>
                    <p class="text-lg leading-7 mb-4">
                        Tim kami yang solid dan profesional menggunakan teknologi terkini untuk memberikan layanan internet yang berkualitas dan handal bagi pelanggan di seluruh Indonesia. Kami berfokus pada inovasi dan kepuasan pelanggan untuk memastikan setiap layanan yang kami berikan memenuhi standar tertinggi.
                    </p>
                    <p class="text-lg leading-7">
                        Kami terus melakukan pengembangan dan inovasi untuk memenuhi kebutuhan pelanggan, serta memegang teguh nilai-nilai profesionalisme, integritas, dan kejujuran dalam menjalankan bisnis. Komitmen ini menjadi landasan utama kami dalam memberikan layanan terbaik dan membangun kepercayaan jangka panjang dengan pelanggan.
                    </p>
                </div>
            @endforelse
        </div>
    </section>

    

    <section id="teams" class="w-full py-16">
        <div class="container max-w-[1130px] mx-auto flex flex-col items-center gap-10">
            
            {{-- Section for Pimpinan --}}
            <h2 class="font-nunito font-bold text-4xl text-primary text-center">Pimpinan Kami</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
                @forelse ($teams->where('team', 'Pimpinan') as $team)
                    <div class="border border-[#E8EAF2] text-primary hover:border-white hover:bg-primary hover:scale-105 transition-all duration-300 rounded-lg p-5 text-center text-white">
                        <img src="{{ asset(Storage::url($team->avatar)) }}" 
                            class="w-[120px] h-[120px] max-w-full max-h-full rounded-full mx-auto mb-4 object-cover transition-transform duration-300 hover:scale-110" 
                            alt="{{ $team->name }}">
                        <h3 class="font-bold text-primary text-xl hover:text-white transition-colors duration-300">{{ $team->name }}</h3>
                        <p class="text-primary hover:text-white transition-colors duration-300">{{ $team->occupation }}</p>
                        <p class="text-sm text-primary hover:text-white transition-colors duration-300">{{ $team->location }}</p>
                    </div>
                @empty
                    <p class="text-white">No team members available</p>
                @endforelse
            </div>
    
            {{-- Section for IT & Administrative Team --}}
            <h2 class="font-nunito font-bold text-4xl text-primary text-center">IT & Administrative Team</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
                @forelse ($teams->where('team', 'IT & Administrative Team') as $team)
                    <div class="border border-[#E8EAF2] text-primary hover:border-white hover:bg-primary hover:scale-105 transition-all duration-300 rounded-lg p-5 text-center text-white">
                        <img src="{{ asset(Storage::url($team->avatar)) }}" 
                            class="w-[120px] h-[120px] max-w-full max-h-full rounded-full mx-auto mb-4 object-cover transition-transform duration-300 hover:scale-110" 
                            alt="{{ $team->name }}">
                        <h3 class="font-bold text-primary text-xl hover:text-white transition-colors duration-300">{{ $team->name }}</h3>
                        <p class="text-primary hover:text-white transition-colors duration-300">{{ $team->occupation }}</p>
                        <p class="text-sm text-primary hover:text-white transition-colors duration-300">{{ $team->location }}</p>
                    </div>
                @empty
                    <p class="text-white">No team members available</p>
                @endforelse
            </div>
    
            {{-- Section for Technician --}}
            <h2 class="font-nunito font-bold text-4xl text-primary text-center">Technician</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
                @forelse ($teams->where('team', 'Technician') as $team)
                    <div class="border border-[#E8EAF2] text-primary hover:border-white hover:bg-primary hover:scale-105 transition-all duration-300 rounded-lg p-5 text-center text-white">
                        <img src="{{ asset(Storage::url($team->avatar)) }}" 
                            class="w-[120px] h-[120px] max-w-full max-h-full rounded-full mx-auto mb-4 object-cover transition-transform duration-300 hover:scale-110" 
                            alt="{{ $team->name }}">
                        <h3 class="font-bold text-primary text-xl hover:text-white transition-colors duration-300">{{ $team->name }}</h3>
                        <p class="text-primary hover:text-white transition-colors duration-300">{{ $team->occupation }}</p>
                        <p class="text-sm text-primary hover:text-white transition-colors duration-300">{{ $team->location }}</p>
                    </div>
                @empty
                    <p class="text-white">No team members available</p>
                @endforelse
            </div>
    
        </div>
    </section>
    

    <footer class="w-full mt-10 bg-[#0E3995] text-white">
        <div class="container max-w-7xl mx-auto flex flex-col items-center justify-center py-10">
            <!-- Follow Us Section -->
            <p id="CompanyName" class="font-nunito font-bold text-lg mb-4">
                Ikuti Kami
            </p>
            <div class="flex items-center gap-6 mb-6">
                <a href="https://facebook.com" target="_blank">
                    <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center transform hover:scale-110 transition-all duration-300 ease-in-out">
                        <svg class="w-5 h-5 text-[#0E3995] fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M22.675 0H1.325C.594 0 0 .594 0 1.326v21.348C0 23.406.594 24 1.326 24H12.82v-9.294H9.691V11.29h3.128V8.717c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.796.143v3.244l-1.918.001c-1.504 0-1.795.714-1.795 1.763v2.311h3.587l-.467 3.416h-3.12V24h6.116c.729 0 1.324-.594 1.324-1.326V1.326C24 .594 23.406 0 22.675 0z"/>
                        </svg>
                    </div>
                </a>
                <a href="https://instagram.com" target="_blank">
                    <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center transform hover:scale-110 transition-all duration-300 ease-in-out">
                        <svg class="w-5 h-5 text-[#0E3995] fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 2.163c3.204 0 3.584.012 4.849.07 1.366.062 2.633.334 3.608 1.309.975.976 1.247 2.243 1.309 3.608.058 1.265.07 1.645.07 4.849s-.012 3.584-.07 4.849c-.062 1.366-.334 2.633-1.309 3.608-.976.975-2.243 1.247-3.608 1.309-1.265.058-1.645.07-4.849.07s-3.584-.012-4.849-.07c-1.366-.062-2.633-.334-3.608-1.309-.975-.976-1.247-2.243-1.309-3.608-.058-1.265-.07-1.645-.07-4.849s.012-3.584.07-4.849c.062-1.366.334-2.633 1.309-3.608.976-.975 2.243-1.247 3.608-1.309 1.265-.058 1.645-.07 4.849-.07m0-2.163C8.755 0 8.333.014 7.052.072 5.766.129 4.557.352 3.607 1.302 2.656 2.253 2.433 3.461 2.376 4.747.418 8.302.418 15.698 2.376 19.253c.057 1.286.28 2.494 1.231 3.444.95.951 2.159 1.173 3.445 1.23 1.281.058 1.703.072 4.848.072s3.567-.014 4.848-.072c1.286-.057 2.494-.279 3.445-1.23.951-.95 1.174-2.158 1.231-3.444.058-1.281.072-1.703.072-4.848s-.014-3.567-.072-4.848c-.057-1.286-.28-2.494-1.231-3.444-.951-.951-2.159-1.173-3.445-1.23-1.281-.058-1.703-.072-4.848-.072zm0 5.838c-3.403 0-6.163 2.76-6.163 6.163s2.76 6.163 6.163 6.163 6.163-2.76 6.163-6.163-2.76-6.163-6.163-6.163zm0 10.123c-2.185 0-3.96-1.775-3.96-3.96s1.775-3.96 3.96-3.96 3.96 1.775 3.96 3.96-1.775 3.96-3.96 3.96zm6.406-11.845c-.796 0-1.443-.647-1.443-1.443s.647-1.443 1.443-1.443 1.443.647 1.443 1.443-.647 1.443-1.443 1.443z"/>
                        </svg>
                    </div>
                </a>
                <a href="https://wa.me/your-number" target="_blank">
                    <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center transform hover:scale-110 transition-all duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#0E3995] fill-current" viewBox="0 0 32 32">
                            <path fill="currentColor" d="M16.002 0C7.164 0 0 7.164 0 16c0 3.074.838 6.06 2.429 8.678l-1.621 6.055a1.177 1.177 0 0 0 1.427 1.427l6.055-1.621A15.946 15.946 0 0 0 16.002 32c8.836 0 16-7.164 16-16 0-8.836-7.164-16-16-16zm9.373 23.873c-.401 1.129-2.012 2.145-2.769 2.243-.756.098-1.429.512-4.827-.998-4.074-1.795-6.616-6.322-6.813-6.619-.197-.295-1.63-2.168-1.63-4.131 0-1.964 1.037-2.936 1.402-3.34.365-.404.803-.512 1.071-.512.268 0 .536.001.768.014.238.015.564-.09.888.677.324.768 1.103 2.658 1.202 2.853.099.197.164.438.014.731-.148.295-.223.473-.438.768-.217.295-.46.66-.64.883-.218.275-.444.573-.193.945.25.372 1.109 1.822 2.383 2.945 1.641 1.454 2.988 1.926 3.368 2.13.379.205.599.184.821-.11.223-.295 1.027-1.25 1.301-1.68.274-.43.547-.357.914-.223.367.134 2.339 1.102 2.744 1.29.405.188.677.29.776.451.1.163.1.965-.301 2.094z"/>
                        </svg>
                    </div>
                </a>
                <a href="https://youtube.com" target="_blank">
                    <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center transform hover:scale-110 transition-all duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#0E3995] fill-current" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M23.499 6.203c-.273-1.032-1.077-1.837-2.109-2.109C19.528 3.5 12 3.5 12 3.5s-7.528 0-9.39.594c-1.032.273-1.837 1.077-2.109 2.109C0 8.064 0 12 0 12s0 3.936.501 5.797c.273 1.032 1.077 1.837 2.109 2.109C4.472 20.5 12 20.5 12 20.5s7.528 0 9.39-.594c1.032-.273 1.837-1.077 2.109-2.109.501-1.861.501-5.797.501-5.797s0-3.936-.501-5.797zm-13.908 9.44V8.358l6.253 3.643-6.253 3.642z"/>
                        </svg>
                    </div>
                </a>
                <a href="https://tiktok.com" target="_blank">
                    <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center transform hover:scale-110 transition-all duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#0E3995] fill-current" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.245V2h-3.445v13.672a2.896 2.896 0 0 1-5.201 1.743l-.002-.001.002.001a2.895 2.895 0 0 1 3.183-4.51v-3.5a6.329 6.329 0 0 0-5.394 10.692 6.33 6.33 0 0 0 10.857-4.424V8.687a8.182 8.182 0 0 0 4.773 1.526V6.79a4.831 4.831 0 0 1-1.003-.104z"/>
                        </svg>
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