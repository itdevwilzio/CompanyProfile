<nav class="w-full bg-white py-4 relative z-[10]">
    <!-- Container for centering content -->
    <div class="container mx-auto flex items-center justify-between px-8">
        <!-- Logo -->
        <div class="flex items-center gap-3">
            <a href="{{ route('front.index') }}">
                <img src="{{ asset('assets/logo/logo_wilzio.png') }}" class="h-[60px] w-auto" alt="logo">
            </a>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden lg:flex justify-center w-full">
            <ul class="flex items-center space-x-6">
                <li class="font-roboto font-bold text-base transition-all duration-300 hover:text-orange-500 {{ request()->routeIs('front.index') ? 'text-cp-dark-blue' : '' }}">
                    <a href="{{ route('front.index') }}">Beranda</a>
                </li>
                <li class="font-roboto font-bold text-base transition-all duration-300 hover:text-orange-500 relative">
                    <button id="desktopDropdownToggle" class="flex items-center">
                        <span>Produk
                        <i id="desktopDropdownIcon" class="feather icon-chevron-down ml-1"></i>
                    </button>
                    <div id="desktopDropdownMenu" class="hidden absolute bg-primary text-white rounded-md mt-2 p-3 w-[200px] left-1/2 transform -translate-x-1/2">
                        <ul class="flex flex-col space-y-2">
                            <li><a href="{{ route('front.product') }}" class="text-white hover:text-orange-500 block py-2">Paket Home</a></li>
                            <li><a href="{{ route('front.location') }}" class="text-white hover:text-orange-500 block py-2">Paket Voucher</a></li>
                        </ul>
                    </div>
                </li>
                <li class="font-roboto font-bold text-base transition-all duration-300 hover:text-orange-500 {{ request()->routeIs('front.team') ? 'text-cp-dark-blue' : '' }}">
                    <a href="{{ route('front.team') }}">Tentang Kami</a>
                </li>
            </ul>
        </div>

        <!-- Mobile Menu Toggle Button -->
        <button id="toggle-sidebar" class="lg:hidden">
            <i class="feather icon-menu text-xl"></i>
        </button>
    </div>
</nav>


<!-- Sidebar Navigation (for mobile) -->
<div id="sidebar" class="fixed top-0 left-0 w-64 h-full bg-primary shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out z-50">
    <div class="p-5">
        <!-- Close Button -->
        <button id="close-sidebar" class="absolute top-5 right-5 text-white hover:text-orange-500 transition-colors duration-300">
            <i class="feather icon-x text-xl"></i>
        </button>

        <!-- Logo -->
        <div class="flex justify-center mb-6 mt-2">
            <a href="{{ route('front.index') }}">
                <img src="{{ asset('assets/logo/logo_wilzio.png') }}" alt="Wilzio Logo" class="h-[60px] w-auto">
            </a>
        </div>

        <!-- Navigation Menu -->
        <nav class="mt-10">
            <ul class="space-y-4">
                <li>
                    <a href="{{ route('front.index') }}" class="block py-2 text-lg font-medium text-white hover:text-orange-500 transition-colors duration-300">
                        Beranda
                    </a>
                </li>
                <li>
                    <button id="mobileDropdownToggle" class="flex items-center justify-between w-full py-2 text-lg font-medium text-white hover:text-orange-500 transition-colors duration-300">
                        <span>Produk
                        <i id="mobileDropdownIcon" class="feather icon-chevron-down ml-2"></i>
                    </button>
                    <ul id="mobileDropdownMenu" class="hidden pl-4 mt-2 space-y-2">
                        <li>
                            <a href="{{ route('front.product') }}" class="block py-2 text-base text-white hover:text-orange-500 transition-colors duration-300">
                                Paket Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('front.location') }}" class="block py-2 text-base text-white hover:text-orange-500 transition-colors duration-300">
                                Paket Voucher
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('front.team') }}" class="block py-2 text-lg font-medium text-white hover:text-orange-500 transition-colors duration-300">
                        Tentang Kami
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>




<!-- Script for Dropdown and Mobile Toggle -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Desktop dropdown
        const desktopDropdownToggle = document.getElementById('desktopDropdownToggle');
        const desktopDropdownMenu = document.getElementById('desktopDropdownMenu');
        const desktopDropdownIcon = document.getElementById('desktopDropdownIcon');
    
        if (desktopDropdownToggle && desktopDropdownMenu && desktopDropdownIcon) {
            desktopDropdownToggle.addEventListener('click', function(event) {
                event.stopPropagation();
                desktopDropdownMenu.classList.toggle('hidden');
                desktopDropdownIcon.classList.toggle('icon-chevron-up');
                desktopDropdownIcon.classList.toggle('icon-chevron-down');
            });
    
            // Close desktop dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!desktopDropdownMenu.contains(event.target) && !desktopDropdownToggle.contains(event.target)) {
                    desktopDropdownMenu.classList.add('hidden');
                    desktopDropdownIcon.classList.remove('icon-chevron-up');
                    desktopDropdownIcon.classList.add('icon-chevron-down');
                }
            });
        }
    
        // Mobile sidebar
        const toggleSidebar = document.getElementById('toggle-sidebar');
        const closeSidebar = document.getElementById('close-sidebar');
        const sidebar = document.getElementById('sidebar');
    
        if (toggleSidebar && sidebar) {
            toggleSidebar.addEventListener('click', function() {
                sidebar.classList.toggle('-translate-x-full');
            });
        }
    
        if (closeSidebar && sidebar) {
            closeSidebar.addEventListener('click', function() {
                sidebar.classList.add('-translate-x-full');
            });
        }
    
        // Mobile dropdown
        const mobileDropdownToggle = document.getElementById('mobileDropdownToggle');
        const mobileDropdownMenu = document.getElementById('mobileDropdownMenu');
        const mobileDropdownIcon = document.getElementById('mobileDropdownIcon');
    
        if (mobileDropdownToggle && mobileDropdownMenu && mobileDropdownIcon) {
            mobileDropdownToggle.addEventListener('click', function() {
                mobileDropdownMenu.classList.toggle('hidden');
                mobileDropdownIcon.classList.toggle('icon-chevron-up');
                mobileDropdownIcon.classList.toggle('icon-chevron-down');
            });
        }
    });
    </script>