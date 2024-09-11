@extends('front.layouts.app')
@section('content')
    <div id="header" class=" relative h-[600px] -mb-[388px]">
        <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
            <x-navbar></x-navbar>
        </div>
    </div>

    <div id="aboutUs" class="relative py-20 px-6 text-white animate__animated animate__fadeInLeft" >
        <div class="container max-w-[1130px] mx-auto flex flex-wrap items-center justify-between gap-10">
            <div class="w-full lg:w-[50%] flex flex-col gap-6">
                <h2 class="text-xl font-bold uppercase tracking-wide">Tentang Kami</h2>
                <h3 class="text-4xl font-bold">Born For Indonesia</h3>
                <p class="text-lg">
                    PT Pasifik Wija Teknologi Adalah Perusahaan Teknologi Yang Didirikan Oleh Putra-Putri Kalimantan Utara Untuk
                    Membawa Manfaat Bagi Masyarakat Indonesia, Khususnya Di Daerah Terpencil Yang Belum Terjangkau Oleh Provider Lain.
                </p>
            </div>
    
            <div class="w-full lg:w-[45%]">
                <img src="{{ asset('assets/images/indonesia-tower.png') }}" alt="Born for Indonesia" class="rounded-lg shadow-lg object-cover w-full animate__animated animate__fadeInRight">
            </div>
        </div>
    </div>
    
    <div id="ProductIdentity" class="container max-w-[1130px] mx-auto flex items-start justify-between py-10 px-6 rounded-lg animate__animated animate__fadeInRight" >
        <div class="w-full lg:w-[40%] flex flex-col items-start justify-center">
            <h2 class="text-white text-2xl font-bold mb-4">Identitas Produk</h2>
            <img src="{{ asset('assets/images/wija-backbone-logo.png') }}" alt="WIJA BACKBONE Logo" class="object-contain w-[300px] h-auto animate__animated animate__zoomIn">
        </div>
    
        <div class="w-full lg:w-[55%] flex flex-col gap-6 animate__animated animate__fadeInUp">
            <p class="text-white text-lg">
                WIJA BACKBONE Merupakan Produk Layanan Internet Utama Yang Kami Tawarkan Dengan Teknologi Terkini, Koneksi Internet Cepat, Dan Harga Terjangkau.
            </p>
            <div id="infoCard" class="bg-white rounded-lg p-4 shadow-md transition-all duration-300">
                <button class="flex justify-between items-center w-full" onclick="toggleCard()">
                    <span class="text-blue-700 text-lg font-bold"> 
                        <i class="fas fa-lightbulb"></i> Arti WIJA BACKBONE ?
                    </span>
                    <span id="iconToggle" class="ml-2 text-xl">&#x25BC;</span> <!-- Down arrow initially -->
                </button>
                <div id="expandableText" class="hidden mt-4 text-blue-700">
                    <p><strong>"WIJA"</strong> berasal dari bahasa Sanskerta yang artinya benih yang berpotensi menjadi luar biasa kuat dan besar di masa depan.</p>
                    <p class="mt-2"><strong>"BACKBONE"</strong> dalam jaringan adalah fondasi vital yang mendukung koneksi dan akses, mengatur lalu lintas data, dan memastikan kinerja jaringan yang lancar dan andal.</p>
                    <p class="mt-2">Jadi Arti <strong>"WIJA BACKBONE"</strong> adalah sebuah kekuatan dan potensi, untuk menjadi pusat dari jaringan Internet yang tumbuh dan berkembang di masa depan, dengan dasar yang kokoh dan inovatif untuk menjamin kinerja jaringan yang optimal dan terpercaya.</p>
                </div>
            </div>
        </div>
    </div>
    
    <div id="APJII" class="container max-w-[1130px] mx-auto flex flex-wrap gap-10 justify-between mt-20 animate__animated animate__fadeInLeft" >
        <!-- Left Section (Text) -->
        <div class="w-full lg:w-[60%] flex flex-col gap-4">
            <h2 class="font-bold text-4xl leading-[45px] text-white">Resmi Terdaftar di APJII</h2>
            <p class="text-lg text-white">
                Kami Telah Terdaftar Secara Resmi Sebagai Penyedia Layanan Internet Service Provider (ISP) Di APJII. Dengan
                Komitmen Kami Untuk Memberikan Layanan Internet Terbaik, Kami Bertekad Untuk Mempercepat Kemajuan Teknologi Di
                Seluruh Indonesia.
            </p>
        </div>
        <!-- Right Section (Logo) -->
        <div class="w-full lg:w-[30%] flex justify-center lg:justify-end ">
            <div class="bg-white p-4 rounded-lg shadow-lg animate__animated animate__fadeInRight">
                <img src="{{ asset('assets/logo/APJII.png') }}" alt="APJII Logo" class="object-contain w-[200px]">
            </div>
        </div>
    </div>
    
    <div id="SuperTeam" class="container max-w-[1130px] mx-auto flex flex-wrap gap-10 mt-20 mb-20 items-center animate__animated animate__fadeInBottom">
        <!-- Left Section (Image) -->
        <div class="w-full lg:w-[50%] flex justify-center">
            <img src="{{ asset('assets/images/teamwork-illustration.png') }}" alt="Super Team" class="object-cover w-full rounded-lg shadow-lg">
        </div>
        <!-- Right Section (Text) -->
        <div class="w-full lg:w-[45%] flex flex-col gap-4">
            <h2 class="font-bold text-4xl leading-[45px] text-white">Super Team</h2>
            <p class="text-lg text-white">
                Tim Kami Yang Solid Dan Profesional Menggunakan Teknologi Terkini Untuk Memberikan Layanan Internet Berkualitas Dan
                Handal Bagi Pelanggan Di Seluruh Indonesia.
            </p>
            <p class="text-lg text-white">
                Kami Terus Melakukan Pengembangan Dan Inovasi Untuk Memenuhi Kebutuhan Pelanggan Serta Memegang Teguh Nilai-Nilai
                Profesionalisme, Integritas, Dan Kejujuran Dalam Menjalankan Bisnis.
            </p>
        </div>
    </div>

    <div id="Teams" class="w-full px-[10px] relative z-10 text-white animate__animated animate__fadeInUp" >
        <div class="container max-w-[1130px] mx-auto flex flex-col gap-[50px] items-center animate__animated animate__fadeInUp">
            <div class="flex flex-col gap-[50px] items-center">
                <div class="breadcrumb flex items-center justify-center gap-[30px] animate__animated animate__fadeInDown">
                    <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Home</p>
                    <span class="text-cp-light-grey">/</span>
                    <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Our Team</p>
                </div>
                <h2 class="font-bold text-4xl leading-[45px] text-center animate__animated animate__fadeInUp">
                    We’re Here to Build <br> Your Awesome Projects
                </h2>
            </div>
            <div class="teams-card-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px] justify-center">
                @forelse ($teams as $team)
                    <div
                        class="card bg-white flex flex-col h-full justify-center items-center p-[30px] px-[29px] gap-[30px] rounded-[20px] border border-[#E8EAF2] hover:shadow-[0_10px_30px_0_#D1D4DF80] hover:border-cp-dark-blue transition-all duration-300 animate__animated animate__fadeInUp">
                        <div
                            class="w-[100px] h-[100px] flex shrink-0 items-center justify-center rounded-full bg-[linear-gradient(150.55deg,_#007AFF_8.72%,_#312ECB_87.11%)]">
                            <div class="w-[90px] h-[90px] rounded-full overflow-hidden">
                                <img src="{{ asset(Storage::url($team->avatar)) }}" class="object-cover object-center w-full h-full" alt="photo">
                            </div>
                        </div>
                        <div class="flex flex-col gap-1 text-center">
                            <p class="font-bold text-cp-dark-blue leading-[30px]">{{ $team->name }}</p>
                            <p class="text-cp-light-grey">{{ $team->occupation }}</p>
                        </div>
                    </div>
                @empty
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


    </script>

@endsection
@push('after-scripts')
    <script>
        function toggleCard() {
            const expandableText = document.getElementById('expandableText');
            const iconToggle = document.getElementById('iconToggle');
            
            if (expandableText.classList.contains('hidden')) {
                expandableText.classList.remove('hidden');
                iconToggle.innerHTML = '&#x25B2;'; // Change to up arrow
            } else {
                expandableText.classList.add('hidden');
                iconToggle.innerHTML = '&#x25BC;'; // Change to down arrow
            }
        }

        AOS.init({
        duration: 4000,  // Animation duration
        once: true       // Whether animation should happen only once
        });
    </script>
@endpush