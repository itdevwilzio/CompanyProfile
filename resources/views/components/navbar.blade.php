<nav class="w-full bg-white py-4 relative z-[10]">
    <!-- Container for centering content -->
    <div class="container mx-auto flex items-center justify-between px-8">
        <!-- Logo -->
        <div class="flex items-center gap-3">
            <a href="{{ route('front.index') }}">
                <img src="{{ asset('assets/logo/logo_wilzio.png') }}" class="h-[60px] w-auto" alt="logo">
            </a>
        </div>

        <!-- Mobile Menu Toggle Button -->
        <button id="toggle-navbar-mobile" class="flex lg:hidden ml-auto z-[20]">
            <i class="feather icon-menu text-xl"></i>
        </button>

        <!-- Overlay for Mobile Navbar -->
        <div class="w-full h-screen fixed bg-black/50 left-0 top-0 hidden lg:hidden z-[15]" id="navbar-overlay"></div>

        <!-- Navbar Items -->
        <ul class="flex flex-wrap navbar-mobile lg:navbar-desktop transition-all z-[20] mx-auto hidden lg:flex z-[50]" id="navbar">
            <!-- Close Button for Mobile Navbar -->
            <button id="close-navbar-mobile" class="h-8 border border-red-400 bg-red-700 px-2 -mr-5 -mt-5 flex items-center justify-center text-white self-end rounded mb-10 lg:hidden shadow-md hover:shadow-sm active:shadow-sm hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out hover:bg-yellow-500 z-[20]">
                <i class="feather icon-x me-1"></i> Close
            </button>

            <!-- Menu Items -->
            <li class="font-roboto font-bold text-base leading-6 transition-all duration-300 hover:text-orange-500 hover:text-xl {{ request()->routeIs('front.index') ? 'lg:bg-white lg:text-cp-dark-blue' : '' }}">
                <a href="{{ route('front.index') }}">Beranda</a>
            </li>
            
            <!-- Dropdown for Produk -->
            <li class="font-roboto font-bold text-base transition-all duration-300 hover:text-orange-500 hover:text-xl relative z-[20] text-center">
                <button id="dropdownToggle" class="font-roboto transition-all duration-300 click:text-cp-dark-blue focus:outline-none">
                    <span>Produk</span>
                    <i id="dropdownIcon" class="feather icon-chevron-down ml-1"></i>
                </button>
            
                <!-- Dropdown Menu -->
    <!-- Dropdown Menu -->
    <div id="dropdownMenu" class="hidden absolute bg-primary text-white rounded-md mt-2 p-3 w-[200px] left-1/2 transform -translate-x-1/2 z-[50] text-center">
        <ul class="flex flex-col space-y-2">
            <li><a href="{{ route('front.product') }}" class="text-white text-xl px-4 py-2  hover:text-orange-500 hover:text-xl block">Paket Home</a></li>
            <li><a href="{{ route('front.location') }}" class="text-white text-xl px-4 py-2  hover:text-orange-500 hover:text-xl block">Paket Voucher</a></li>
        </ul>
    </div>
            </li>

            <!-- Other Navigation Items -->
            <li class="font-roboto font-bold text-base transition-all duration-300 hover:text-orange-500 hover:text-xl {{ request()->routeIs('front.team') ? 'text-cp-dark-blue' : '' }}">
                <a href="{{ route('front.team') }}">Tentang Kami</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Script for Dropdown and Mobile Toggle -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Mobile menu toggle
        const toggleNavbarMobile = document.getElementById('toggle-navbar-mobile');
        const navbarOverlay = document.getElementById('navbar-overlay');
        const closeNavbarMobile = document.getElementById('close-navbar-mobile');
        const navbar = document.getElementById('navbar');

        toggleNavbarMobile.addEventListener('click', function () {
            navbar.classList.remove('hidden');
            navbarOverlay.classList.remove('hidden');
        });

        closeNavbarMobile.addEventListener('click', function () {
            navbar.classList.add('hidden');
            navbarOverlay.classList.add('hidden');
        });

        navbarOverlay.addEventListener('click', function () {
            navbar.classList.add('hidden');
            navbarOverlay.classList.add('hidden');
        });

        // Dropdown menu toggle
        const dropdownToggle = document.getElementById('dropdownToggle');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const dropdownIcon = document.getElementById('dropdownIcon');

        dropdownToggle.addEventListener('click', function (event) {
            event.stopPropagation();
            dropdownMenu.classList.toggle('hidden');
            
            // Toggle between chevron-down and chevron-up icons
            if (dropdownMenu.classList.contains('hidden')) {
                dropdownIcon.classList.remove('icon-chevron-up');
                dropdownIcon.classList.add('icon-chevron-down');
            } else {
                dropdownIcon.classList.remove('icon-chevron-down');
                dropdownIcon.classList.add('icon-chevron-up');
            }
        });

        // Close the dropdown when clicking outside
        document.addEventListener('click', function (event) {
            if (!dropdownMenu.contains(event.target) && !dropdownToggle.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
                dropdownIcon.classList.remove('icon-chevron-up');
                dropdownIcon.classList.add('icon-chevron-down');
            }
        });
    });
</script>
