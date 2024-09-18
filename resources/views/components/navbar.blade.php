<nav class="flex flex-wrap items-center justify-between bg-white p-[20px_30px] rounded-[20px] gap-y-3">
    <div class="flex items-center gap-3">
        <div class="flex shrink-0 h-[43px] overflow-hidden">
            <img src="{{ asset('assets/logo/logo.svg') }}" class="object-contain w-full h-full" alt="logo">
        </div>
        <div class="flex flex-col">
            <p id="CompanyName" class="font-extrabold text-xl leading-[30px]">Wilzio</p>
            <p id="CompanyTagline" class="text-sm text-cp-light-grey">Build Futuristic Dreams</p>
        </div>
    </div>
    <button id="toggle-navbar-mobile" class="flex lg:hidden"><i class="feather icon-menu text-xl"></i></button>
    <div class="w-full h-screen fixed bg-black/50 left-0 top-0 hidden lg:hidden" id="navbar-overlay"></div>
    <ul class="flex flex-wrap navbar-mobile lg:navbar-desktop transition-all" id="navbar">
        <button id="close-navbar-mobile"
            class="h-8 border border-red-400 bg-red-700 px-2 -mr-5 -mt-5 flex items-center justify-center text-white self-end rounded mb-10 lg:hidden">
            <i class="feather icon-x me-1"></i> Close
        </button>
        <li
            class="font-semibold transition-all duration-300 hover:text-cp-dark-blue  {{ request()->routeIs('front.index') ? 'lg:bg-white bg-cp-black lg:text-cp-dark-blue' : '' }}">
            <a href="{{ route('front.index') }}">Beranda</a>
        </li>
        <li class="font-semibold transition-all duration-300 hover:text-cp-dark-blue nav-item has-sub">
            <button href="#">Produk</button>
            <div class="w-full lg:w-fit bg-blue-800 mt-4 lg:mt-0 text-white lg:text-gray-900 lg:bg-white sub-item lg:left-1/2 lg:-translate-x-1/2 shadow-lg">
                <ul class="flex flex-col">
                    <li
                        class="font-semibold transition-all text-nowrap p-2 duration-300 hover:text-cp-black lg:hover:text-cp-dark-blue child-item  {{ request()->routeIs('front.index') ? 'lg:bg-white lg:bg-cp-black lg:text-cp-dark-blue' : '' }}">
                        <a href="{{ route('front.product') }}">Produk A</a>
                    </li>
                    <li
                        class="font-semibold transition-all text-nowrap p-2 duration-300 hover:text-cp-black lg:hover:text-cp-dark-blue child-item {{ request()->routeIs('front.index') ? 'lg:bg-white lg:bg-cp-black lg:text-cp-dark-blue' : '' }}">
                        <a href="{{ route('front.location') }}">Produk B</a>
                    </li>
                </ul>
            </div>
        </li>
        <li
            class="font-semibold transition-all duration-300 hover:text-cp-dark-blue {{ request()->routeIs('front.team') ? 'text-cp-dark-blue' : '' }}">
            <a href="{{ route('front.team') }}">Tentang Kami</a>
        </li>
        <li class="font-semibold transition-all duration-300 hover:text-cp-dark-blue">
            <a href="">Client Area</a>
        </li>
        {{-- <li
            class="font-semibold transition-all duration-300 hover:text-cp-dark-blue {{ request()->routeIs('front.about') ? 'text-cp-dark-blue' : '' }}">
            <a href="{{ route('front.about') }}">About</a>
        </li> --}}
    </ul>
    {{-- <a href="{{ route('front.appointment') }}"
        class="bg-cp-dark-blue p-[14px_20px] w-fit rounded-xl hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300 font-bold text-white">Get
        a Quote</a> --}}
</nav>
