<nav class="flex flex-wrap items-center justify-between bg-white p-[20px_30px] rounded-[20px] gap-y-3 h-[90px]">
    <div class="flex items-center gap-3 absolute left-8">
        <div class="flex shrink-0 h-[43px] overflow-hidden">
            <img src="{{ asset('assets/logo/logo.svg') }}" class="object-contain w-full h-full" alt="logo">
        </div>
        <div class="flex flex-col">
            <p id="CompanyName" class="font-extrabold text-xl leading-[30px]">Wilzio</p>
            <p id="CompanyTagline" class="text-sm text-cp-light-grey">Build Futuristic Dreams</p>
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
            class="font-semibold transition-all duration-300 hover:text-cp-dark-blue  {{ request()->routeIs('front.index') ? 'lg:bg-white bg-cp-black lg:text-cp-dark-blue' : '' }}">
            <a href="{{ route('front.index') }}">Beranda</a>
        </li>
        
        <!-- Dropdown for Produk -->
        <li class="font-semibold transition-all duration-300 nav-item has-sub relative hover:text-cp-dark-blue">
            <button id="dropdownToggle" class="font-semibold transition-all duration-300 click:text-cp-dark-blue focus:outline-none">
                Produk
            </button>
            <div id="dropdownMenu" class="hidden lg:absolute w-full lg:w-fit mt-4 lg:mt-0 text-white lg:text-gray-900 lg:bg-white sub-item lg:left-1/2 lg:-translate-x-1/2 lg:shadow-lg">
                <ul class="flex flex-col grow">
                    <li
                        class="font-semibold transition-all text-nowrap p-2 duration-300 hover:text-cp-dark-blue child-item  {{ request()->routeIs('front.product') ? 'lg:bg-white bg-cp-black lg:text-cp-dark-blue' : '' }}">
                        <a href="{{ route('front.product') }}">Produk A</a>
                    </li>
                    <li
                        class="font-semibold transition-all text-nowrap p-2 duration-300 hover:text-cp-dark-blue child-item  {{ request()->routeIs('front.location') ? 'lg:bg-white bg-cp-black lg:text-cp-dark-blue' : '' }}">
                        <a href="{{ route('front.location') }}">Produk B</a>
                    </li>
                </ul>
            </div>
        </li>
        
        <li class="font-semibold transition-all duration-300 hover:text-cp-dark-blue {{ request()->routeIs('front.team') ? 'text-cp-dark-blue' : '' }}">
            <a href="{{ route('front.team') }}">Tentang Kami</a>
        </li>
        <li class="font-semibold transition-all duration-300 hover:text-cp-dark-blue">
            <a href="">Client Area</a>
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
