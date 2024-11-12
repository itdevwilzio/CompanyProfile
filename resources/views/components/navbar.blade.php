<nav class="w-full bg-white py-4 relative z-[10]">
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
                        <span>Produk</span>
                        <i id="desktopDropdownIcon" class="feather icon-chevron-down ml-1"></i>
                    </button>
                    <div id="desktopDropdownMenu" class="hidden absolute bg-primary text-white rounded-md mt-2 p-3 w-[200px] left-1/2 transform -translate-x-1/2 z-50 shadow-lg">
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
        <button id="open-sidebar" class="md:hidden text-gray-500 hover:text-gray-700">
            <i class="feather icon-menu text-2xl"></i>
        </button>
    </div>
</nav>

<!-- Sidebar Navigation (for mobile) -->
<div id="sidebar" class="fixed top-0 right-0 w-[280px] h-full bg-primary shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50 overflow-y-auto">
    <div class="flex flex-col items-end p-5">
        <!-- Close Button -->
        <button id="close-sidebar" class="absolute top-5 right-5 text-white hover:text-black transition-colors duration-300 bg-red-500 hover:bg-yellow-400 px-3 py-2 rounded-lg flex items-center gap-2">
            <span>Close</span>
            <i class="feather icon-x text-xl"></i>
        </button>        

        <!-- Logo with added top margin -->
        <div class="flex justify-end mt-10 mb-6"></div>

        <!-- Navigation Menu -->
        <ul class="flex flex-col items-end space-y-4 w-full">
            <li>
                <a href="{{ route('front.index') }}" class="text-white text-right hover:text-orange-500 hover:scale-105 hover:font-bold transition-transform block">Beranda</a>
            </li>
            <li class="w-full flex flex-col items-end space-y-4">
                <!-- Dropdown Toggle Button -->
                <button id="mobileDropdownToggle" class="text-white hover:text-orange-500 hover:scale-105 hover:font-bold transition-transform flex items-center gap-2">
                    <i id="mobileDropdownIcon" class="feather icon-chevron-down"></i>
                    <span id="mobileDropdownText">Produk</span>
                </button>
                
                <!-- Dropdown Menu -->
                <ul id="mobileDropdownMenu" class="hidden flex-col space-y-4 mt-2 w-full"> <!-- Updated space-y-4 for more spacing -->
                    <li class="flex justify-end">
                        <a href="{{ route('front.product') }}" class="text-white hover:text-orange-500 hover:scale-105 hover:font-bold transition-transform text-right">Paket Home</a>
                    </li>
                    <li class="flex justify-end">
                        <a href="{{ route('front.location') }}" class="text-white hover:text-orange-500 hover:scale-105 hover:font-bold transition-transform text-right">Paket Voucher</a>
                    </li>
                </ul>
            </li>
            
            <li>
                <a href="{{ route('front.team') }}" class="text-white text-right hover:text-orange-500 hover:scale-105 hover:font-bold transition-transform block">Tentang Kami</a>
            </li>
        </ul>
    </div>
</div>





<!-- Script for Sidebar and Dropdown Toggle -->
<script>
    //navbar actions
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownToggle = document.getElementById('desktopDropdownToggle');
        const dropdownMenu = document.getElementById('desktopDropdownMenu');
        const dropdownIcon = document.getElementById('desktopDropdownIcon');

        // Toggle dropdown on click
        dropdownToggle.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent event from bubbling up
            dropdownMenu.classList.toggle('hidden');
            dropdownIcon.classList.toggle('rotate-180');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
                dropdownIcon.classList.remove('rotate-180');
            }
        });
    });

    //sidebar actions
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const openButton = document.getElementById('open-sidebar');
        const closeButton = document.getElementById('close-sidebar');
        const mobileDropdownToggle = document.getElementById('mobileDropdownToggle');
        const mobileDropdownMenu = document.getElementById('mobileDropdownMenu');
        const mobileDropdownIcon = document.getElementById('mobileDropdownIcon');

        // Open sidebar
        openButton.addEventListener('click', () => {
            sidebar.classList.remove('translate-x-full');
            document.body.classList.add('overflow-hidden');
        });

        // Close sidebar
        closeButton.addEventListener('click', () => {
            sidebar.classList.add('translate-x-full');
            document.body.classList.remove('overflow-hidden');
        });

        // Toggle dropdown menu in the sidebar
        mobileDropdownToggle.addEventListener('click', () => {
            mobileDropdownMenu.classList.toggle('hidden');
            mobileDropdownIcon.classList.toggle('rotate-180');
        });

        // Close sidebar when clicking outside
        document.addEventListener('click', (e) => {
            if (!sidebar.contains(e.target) && !openButton.contains(e.target) && !e.target.closest('#sidebar')) {
                sidebar.classList.add('translate-x-full');
                document.body.classList.remove('overflow-hidden');
            }
        });
    });
</script>
