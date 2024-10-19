<nav class="w-full bg-white py-4">
    <!-- Container for centering content -->
    <div class="container mx-auto flex items-center justify-between px-8">
        <!-- Logo and Company Info -->
        <div class="flex items-center gap-3">
            <!-- Logo -->
            <a href="{{ route('front.index') }}">
                <img src="{{ asset('assets/logo/logo.png') }}" class="h-[60px] w-auto" alt="logo">
            </a>
            <!-- Company Name and Tagline -->
            <div class="flex flex-col">
                <a href="{{ route('front.index') }}">
                    <p class="font-extrabold text-xl text-primary leading-tight">Wilzio</p>
                    <p class="text-sm text-cp-light-blue">Build Futuristic Dreams</p>
                </a>
            </div>
        </div>
    <button id="toggle-navbar-mobile" class="flex lg:hidden ml-auto"><i class="feather icon-menu text-xl"></i></button>
    <div class="w-full h-screen fixed bg-black/50 left-0 top-0 hidden lg:hidden z-[99]" id="navbar-overlay"></div>
    <ul class="flex flex-wrap navbar-mobile lg:navbar-desktop transition-all z-[999] mx-auto" id="navbar">
        <button id="close-navbar-mobile"
            class="h-8 border border-red-400 bg-red-700 px-2 -mr-5 -mt-5 flex items-center justify-center text-white self-end rounded mb-10 lg:hidden">
            <i class="feather icon-x me-1"></i> Close
        </button>
        <li
        class="font-roboto font-normal text-base leading-6 transition-all duration-300 hover:text-cp-dark-blue {{ request()->routeIs('front.index') ? 'lg:bg-white bg-cp-black lg:text-cp-dark-blue' : '' }}">
        <a href="{{ route('front.index') }}">Beranda</a>
        </li>
        
        <!-- Dropdown for Produk -->
        <li class="font-roboto transition-all duration-300 nav-item has-sub relative hover:text-cp-dark-blue">
            <button id="dropdownToggle" class="font-roboto transition-all duration-300 click:text-cp-dark-blue focus:outline-none">
                Produk
            </button>
            <div id="dropdownMenu" class="hidden lg:absolute w-full lg:w-fit mt-4 lg:mt-0 text-white lg:text-gray-900 lg:bg-white sub-item lg:left-1/2 lg:-translate-x-1/2 lg:shadow-lg">
                <ul class="flex flex-col grow text-left">
                    <li
                        class="font-roboto transition-all text-nowrap p-2 duration-300 hover:text-cp-dark-blue child-item  {{ request()->routeIs('front.product') ? 'lg:bg-white bg-cp-black lg:text-cp-dark-blue' : '' }}">
                        <a href="{{ route('front.product') }}">Paket Home</a>
                    </li>
                    <li
                        class="font-roboto transition-all text-nowrap p-2 duration-300 hover:text-cp-dark-blue child-item  {{ request()->routeIs('front.location') ? 'lg:bg-white bg-cp-black lg:text-cp-dark-blue' : '' }}">
                        <a href="{{ route('front.location') }}">Paket Voucher</a>
                    </li>
                </ul>
            </div>
        </li>
        
        <li class="font-roboto transition-all duration-300 hover:text-cp-dark-blue {{ request()->routeIs('front.team') ? 'text-cp-dark-blue' : '' }}">
            <a href="{{ route('front.team') }}">Tentang Kami</a>
        </li>
        <li class="font-roboto transition-all duration-300 hover:text-cp-dark-blue">
            <a href="{{ route('/login') }}">Client Area</a>
        </li>
    </ul>
</nav>

<!-- Add Script for Toggle Dropdown -->
<script>
    // Toggle dropdown menu on button click
    document.getElementById('dropdownToggle').addEventListener('click', function(event) {
        event.stopPropagation();
        const dropdownMenu = document.getElementById('dropdownMenu');
        dropdownMenu.classList.toggle('hidden'); // Toggle visibility
    });

    // Close dropdown menu when clicking outside of it
    document.addEventListener('click', function(event) {
        const dropdownMenu = document.getElementById('dropdownMenu');
        const dropdownToggle = document.getElementById('dropdownToggle');

        if (!dropdownMenu.contains(event.target) && !dropdownToggle.contains(event.target)) {
            dropdownMenu.classList.add('hidden'); // Close the menu if clicked outside
        }
    });
</script>
