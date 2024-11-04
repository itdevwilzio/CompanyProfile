<nav class="w-full bg-white py-4">
    <!-- Container for centering content -->
    <div class="container mx-auto flex items-center justify-between px-8">
        <!-- Logo -->
        <div class="flex items-center gap-3">
            <a href="{{ route('front.index') }}">
                <img src="{{ asset('assets/logo/logo_wilzio.png') }}" class="h-[60px] w-auto" alt="logo">
            </a>
        </div>

        <!-- Mobile Menu Toggle Button -->
        <button id="toggle-navbar-mobile" class="flex lg:hidden ml-auto">
            <i class="feather icon-menu text-xl"></i>
        </button>

        <!-- Overlay for Mobile Navbar -->
        <div class="w-full h-screen fixed bg-black/50 left-0 top-0 hidden lg:hidden z-[99]" id="navbar-overlay"></div>

        <!-- Navbar Items -->
        <ul class="flex flex-wrap navbar-mobile lg:navbar-desktop transition-all z-[999] mx-auto" id="navbar">
            <!-- Close Button for Mobile Navbar -->
            <button id="close-navbar-mobile" class="h-8 border border-red-400 bg-red-700 px-2 -mr-5 -mt-5 flex items-center justify-center text-white self-end rounded mb-10 lg:hidden shadow-md hover:shadow-sm active:shadow-sm hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out hover:bg-yellow-500">
                <i class="feather icon-x me-1"></i> Close
            </button>

            <!-- Menu Items -->
            <li class="font-roboto font-bold text-base leading-6 transition-all duration-300 hover:text-orange-500 hover:text-xl {{ request()->routeIs('front.index') ? 'lg:bg-white bg-cp-black lg:text-cp-dark-blue' : '' }}">
                <a href="{{ route('front.index') }}">Beranda</a>
            </li>

            <!-- Dropdown for Produk -->
            <li class="relative font-roboto font-bold text-base transition-all duration-300 hover:text-orange-500 hover:text-xl">
                <button id="dropdownToggle" class="font-roboto transition-all duration-300 focus:outline-none flex items-center lg:justify-start text-left">
                    Produk
                    <svg class="ml-1 h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a 1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div id="dropdownMenu" class="hidden absolute lg:w-[200px] mt-2 text-black bg-white shadow-md rounded-md p-3 w-full lg:left-0 lg:top-full z-10">
                    <ul class="flex flex-col grow text-left space-y-2">
                        {{-- paket home --}}
                        <x-dropdown-link :href="route('front.product')" class="text-black text-xl px-4 py-2 hover:bg-gray-100 block text-left">
                            {{ __('Paket Home') }}
                        </x-dropdown-link>
                        {{-- paket voucher --}}
                        <x-dropdown-link :href="route('front.location')" class="text-black text-xl  px-4 py-2 hover:bg-gray-100 block text-left">
                            {{ __('Paket Voucher') }}
                        </x-dropdown-link>
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

        dropdownToggle.addEventListener('click', function (event) {
            event.stopPropagation();
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function (event) {
            if (dropdownMenu && !dropdownMenu.contains(event.target) && !dropdownToggle.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>
