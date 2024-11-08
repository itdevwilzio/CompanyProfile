@extends('front.layouts.app')

@section('head')
    <meta name="description" content="Pelajari lebih lanjut tentang Wilzio dan misi kami untuk menyediakan layanan internet berkualitas tinggi. Jelajahi tim super kami, sertifikasi, dan lainnya.">
    <meta name="keywords" content="Wilzio, Penyedia Internet, Layanan Internet, Tim Super, Sertifikasi, Indonesia">
    <meta name="author" content="Wilzio Penyedia Internet">
    <meta property="og:title" content="Tentang Wilzio - Penyedia Internet Terkemuka">
    <meta property="og:description" content="Wilzio menawarkan layanan internet terbaik di Indonesia. Temukan perjalanan kami, tim super kami, dan sertifikasi yang menjadikan kami pilihan terbaik.">
    <meta property="og:image" content="{{ asset('assets/teams/Thank-min.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">

    <style>
        /* Canvas overlay for particle effect */
        #particles-trail-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10;
            pointer-events: none;
        }
    </style>
@endsection

@section('content')
    <!-- Header Section -->
    <div id="header" class="relative">
        <div class="container max-w-[960px] mx-auto relative pt-10 z-10">
            <x-navbar></x-navbar>
            <h2 class="font-nunito font-bold text-primary text-4xl text-center mb-12">
                Tentang Kami
            </h2>
        </div>
    </div>

    <!-- Section: Born for Indonesia -->


    <section id="born-for-indonesia" class="w-full py-52 bg-blue-800 relative overflow-hidden -mt-32">
        <!-- Wave SVG Positioned Above the Section -->
        <div class="w-full absolute z-[1] top-0">
            <div class="bg-white h-20"></div>
            <svg width="100%" height="80px" id="svg" preserveAspectRatio="none" viewBox="0 0 1440 390" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150">
                <path d="M 0,400 L 0,75 C 48.05771365149833,54.46055000616599 96.11542730299666,33.921100012331976 145,48 C 193.88457269700334,62.078899987668024 243.59600443951166,110.77614995683808 306,110 C 368.40399556048834,109.22385004316192 443.5005549389566,58.9743001603157 491,43 C 538.4994450610434,27.0256998396843 558.4017758046615,45.32664940189912 613,68 C 667.5982241953385,90.67335059810088 756.8923418423973,117.71910223208782 818,105 C 879.1076581576027,92.28089776791218 912.0288568257492,39.79694166974965 958,42 C 1003.9711431742508,44.20305833025035 1062.992230854606,101.09313108891357 1114,109 C 1165.007769145394,116.90686891108643 1208.0022197558267,75.83053397459614 1261,62 C 1313.9977802441733,48.16946602540387 1376.9988901220868,61.58473301270193 1440,75 L 1440,400 L 0,400 Z" stroke="none" stroke-width="0" fill="#ffffff" fill-opacity="0.4" class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 200)"></path>
                <path d="M 0,400 L 0,175 C 40.6115673942533,161.34534467875199 81.2231347885066,147.690689357504 137,146 C 192.7768652114934,144.309310642496 263.7190282402269,154.582587248736 326,159 C 388.2809717597731,163.417412751264 441.9007522505857,161.9789616475521 488,168 C 534.0992477494143,174.0210383524479 572.67796275743,187.50156616105562 621,182 C 669.32203724257,176.49843383894438 727.3873967196943,152.01477370822545 780,153 C 832.6126032803057,153.98522629177455 879.7724503637933,180.43933900604262 941,190 C 1002.2275496362067,199.56066099395738 1077.5228018251328,192.22787026760392 1136,181 C 1194.4771981748672,169.77212973239608 1236.1363423356763,154.64917992354174 1284,153 C 1331.8636576643237,151.35082007645826 1385.931828832162,163.17541003822913 1440,175 L 1440,400 L 0,400 Z" stroke="none" stroke-width="0" fill="#ffffff" fill-opacity="0.53" class="transition-all duration-300 ease-in-out delay-150 path-1" transform="rotate(-180 720 200)"></path>
                <path d="M 0,400 L 0,275 C 66.9115797262301,273.18394376618573 133.8231594524602,271.3678875323714 188,268 C 242.1768405475398,264.6321124676286 283.61894191638925,259.71239363669997 337,264 C 390.38105808361075,268.28760636330003 455.701072881983,281.7825379208287 508,292 C 560.298927118017,302.2174620791713 599.5767665556788,309.1574546799852 639,299 C 678.4232334443212,288.8425453200148 717.9918608953016,261.58764335923047 770,248 C 822.0081391046984,234.4123566407695 886.455789863115,234.49197188309282 942,238 C 997.544210136885,241.50802811690718 1044.1849796522383,248.4444691083981 1093,261 C 1141.8150203477617,273.5555308916019 1192.8042915279318,291.73015168331483 1251,295 C 1309.1957084720682,298.26984831668517 1374.597854236034,286.6349241583426 1440,275 L 1440,400 L 0,400 Z" stroke="none" stroke-width="0" fill="#ffffff" fill-opacity="1" class="transition-all duration-300 ease-in-out delay-150 path-2" transform="rotate(-180 720 200)"></path>
            </svg>
        </div>
    
        <!-- Content Container -->
        <div class="container max-w-[1140px] mx-auto flex flex-col lg:flex-row items-center gap-10 relative px-4">
            @foreach ($abouts as $about)
                <!-- Text Section -->
                <div class="w-full lg:w-1/2 text-white lg:pr-10 relative z-10 transition-all duration-300 hover:text-gray-200">
                    <h2 class="font-nunito font-bold text-4xl mb-6">
                        {{ $about->name }}
                    </h2>
                    <p class="font-nunito text-base leading-7 mb-8">
                        {!! $about->description !!}
                    </p>
                </div>
    
                <!-- Image Section -->
                <div class="w-full lg:w-1/2 flex justify-center lg:justify-end relative z-10">
                    <div class="rounded-xl overflow-hidden shadow-2xl transform transition-transform duration-300 hover:scale-105">
                        <img 
                            src="{{ Storage::url($about->thumbnail) }}" 
                            class="object-cover w-full h-full"
                            alt="{{ $about->name }}"
                        >
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    
    

    @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tsparticles"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            tsParticles.load("particles-trail-canvas", {
                particles: {
                    number: { value: 0 },
                    color: { value: "#ffffff" },
                    shape: { type: "circle" },
                    opacity: {
                        value: 0.7,
                        anim: { enable: true, speed: 1, opacity_min: 0.1, sync: false }
                    },
                    size: {
                        value: 3,
                        random: true,
                        anim: { enable: true, speed: 5, size_min: 0.1, sync: false }
                    },
                    move: {
                        enable: true,
                        speed: 6,
                        direction: "none",
                        random: false,
                        straight: false,
                        out_mode: "out",
                        attract: { enable: true, rotateX: 600, rotateY: 1200 }
                    },
                    line_linked: { enable: false }
                },
                interactivity: {
                    events: {
                        onhover: { enable: true, mode: "trail" },
                        onclick: { enable: false }
                    },
                    modes: {
                        trail: {
                            delay: 0.02,
                            quantity: 5
                        }
                    }
                },
                retina_detect: true
            });
        });
    </script>
    @endsection

    <!-- Section: Product Identity -->
    <section id="product-identity" class="w-full py-16">
        <div class="container max-w-[1130px] mx-auto flex flex-col lg:flex-row items-center lg:items-start gap-10">
            @foreach ($product_identities as $product_identity)
            <!-- Logo Section with Hover Effect -->
            <div class="relative w-full lg:w-1/2 text-white flex justify-center items-center bg-white p-4 rounded-lg">
                <img src="{{ Storage::url($product_identity->logo) }}" 
                class="object-contain w-full rounded-lg transition-transform duration-300 hover:scale-105 shadow-custom filter brightness-150" 
                alt="{{ $product_identity->name }} Logo">
            </div>
            
            <!-- Product Identity Section -->
            <div class="w-full lg:w-1/2 text-primary lg:text-left flex flex-col justify-center transition-all duration-300 hover:text-black">
                <h2 class="font-nunito font-bold text-4xl mb-2">
                    {{ $product_identity->name }}
                </h2>
                <p class="text-lg leading-7 mb-2">
                    {!! $product_identity->description !!}
                </p>
                <p class="text-lg leading-7 mb-2">
                    {!! $product_identity->vision !!}
                </p>
                <p class="text-lg leading-7 mb-2">
                    {!! $product_identity->mission !!}
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
                            <h3 class="font-bold text-lg">{{ __('Arti ' . $product_identity->name . '?') }}</h3>
                        </div>
                        <!-- Arrow Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-900 transform transition-transform duration-300" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                    </div>
                
                    <!-- Accordion Content -->
                    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-2" class="mt-4">
                        <p class="text-sm mb-4">
                            {!! $product_identity->contentl1 !!}
                        </br>
                            {!! $product_identity->contentl2 !!}
                        </br>
                            {!! $product_identity->contentl3 !!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <section id="certification" class="w-full py-16 bg-primary relative overflow-hidden">
        <div class="container max-w-[1140px] mx-auto flex flex-col lg:flex-row items-center gap-10">
            @foreach ($certifications as $certification)
                <!-- Text Section -->
                <div class="w-full lg:w-1/2 text-white lg:pr-10 transition-all duration-300 hover:text-black">
                    <h2 class="font-nunito font-bold text-4xl mb-6">
                        {{ $certification->title }}
                    </h2>
                    <p class="font-nunito text-base leading-7 mb-8">
                        {!! $certification->description  !!}
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
            @endforeach
        </div>
    </section>

    <!-- Super Team Section -->

    <section id="super-team" class="w-full py-16">
        <div class="container max-w-[1130px] mx-auto flex flex-col lg:flex-row items-center gap-10 text-primary">
            @foreach($super_teams as $super_team)
                <!-- Image Section with Hover Effect -->
                <div class="w-full lg:w-1/2 flex justify-center">
                    @if($super_team->image)
                        <img src="{{ Storage::url($super_team->image) }}" 
                                class="object-contain text-primary w-full rounded-lg transition-transform duration-300 hover:scale-105 shadow-custom" 
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
                        {!! $super_team->description !!}
                    </p>
                    <p class="text-lg leading-7">
                        {{ $super_team->additional_info }}
                    </p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Our Team Section -->

    <section id="teams" class="w-full py-16">
        <div class="container max-w-[1130px] mx-auto flex flex-col items-center gap-10">
            
            {{-- Section for Pimpinan --}}
            <h2 class="font-nunito text-4xl text-center">Pimpinan Kami</h2>
            <div class="
            grid gap-10 items-center justify-center mx-auto 
            @if ($teams->where('team', 'Pimpinan')->count() == 1) 
                grid-cols-1 
            @elseif ($teams->where('team', 'Pimpinan')->count() == 2) 
                grid-cols-2 
            @else 
                grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 
            @endif
        ">
            @foreach ($teams->where('team', 'Pimpinan') as $team)
                <div class="border border-[#E8EAF2] text-primary transition-all duration-300 rounded-lg p-5 text-center">
                    <img src="{{ asset(Storage::url($team->avatar)) }}" 
                        class="w-[150px] h-[150px] max-w-full max-h-full rounded-full mx-auto mb-4 object-cover transition-transform duration-300 hover:scale-110" 
                        alt="{{ $team->name }}">
                        <h3 class="font-bold text-primary text-xl">{!! $team->name !!}</h3>
                    <p class="text-primary ">{!! $team->occupation !!}</p>
                    <p class="text-sm text-primary">{!! $team->location !!}</p>
                </div>
            @endforeach
        </div>
        
            
    
            {{-- Section for IT & Administrative Team --}}
            <h2 class="font-nunito font-bold text-4xl text-primary text-center">IT & Administrative Team</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
                @foreach ($teams->where('team', 'IT & Administrative Team') as $team)
                    <div class="border border-[#E8EAF2] text-primary transition-all duration-300 rounded-lg p-5 text-center">
                        <img src="{{ asset(Storage::url($team->avatar)) }}" 
                            class="w-[120px] h-[120px] max-w-full max-h-full rounded-full mx-auto mb-4 object-cover transition-transform duration-300 hover:scale-110" 
                            alt="{{ $team->name }}">
                        <h3 class="font-bold text-primary">{!! $team->name !!}</h3>
                        <p class="text-primary">{!! $team->occupation !!}</p>
                        <p class="text-sm text-primary">{!! $team->location !!}</p>
                    </div>
                @endforeach
            </div>
            
    
            {{-- Section for Technician --}}
            <h2 class="font-nunito font-bold text-4xl text-primary text-center">Technician</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
                @foreach ($teams->where('team', 'Technician Team') as $team)
                    <div class="border border-[#E8EAF2] text-primary transition-all duration-300 rounded-lg p-5 text-center text-white">
                        <img src="{{ asset(Storage::url($team->avatar)) }}" 
                            class="w-[120px] h-[120px] max-w-full max-h-full rounded-full mx-auto mb-4 object-cover transition-transform duration-300 hover:scale-110" 
                            alt="{{ $team->name }}">
                        <h3 class="font-bold text-primary">{{ $team->name }}</h3>
                        <p class="text-primary">{{ $team->occupation }}</p>
                        <p class="text-sm text-primary">{{ $team->location }}</p>
                    </div>
                @endforeach
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