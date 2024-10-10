@extends('front.layouts.app')

@section('content')
    <div id="header" class="relative">
        <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
            <x-navbar></x-navbar>
        </div>
    </div>

    {{-- Section Voucher --}}
    <div class="container mx-auto flex flex-col mt-20 max-w-2xl text-white p-2">
        @if (session()->has('success'))
            <div class="my-5 p-4 bg-green-500 text-white rounded-lg">{{ session('success') }}</div>
        @endif
        <h1 class="text-yellow-400 font-bold text-xl text-center mb-10">Beli Voucher Wi-Fi</h1>

        {{-- WhatsApp Button Below Text --}}
        <div class="text-center mt-10">
            <a href="https://wa.me/6285179706639" target="_blank" 
               class="whatsapp-button bg-green-500 text-white px-8 py-4 text-xl rounded-full shadow-lg hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-green-400 flex items-center justify-center">
                <i class="fab fa-whatsapp mr-2"></i> Hubungi Customer Service Wilzio
            </a>
        </div>
    </div>
    {{-- End Section Voucher --}}

    <footer class="w-full mt-10 overflow-hidden bg-cp-black">
        <div class="container max-w-[1130px] mx-auto flex flex-wrap gap-y-2 items-center justify-center pt-[30px] pb-[40px] relative z-10">
            <div class="flex flex-col gap-4 items-start">
                <div class="flex items-center gap-2">
                    <div class="h-[25px] w-auto">
                        <img src="{{ asset('assets/logo/logo.svg') }}" class="object-contain w-full h-full" alt="Company logo">
                    </div>
                    <div class="flex flex-col">
                        <p id="CompanyName" class="font-extrabold text-xl leading-[28px] text-white">Wilzio</p>
                        <p id="CompanyTagline" class="text-sm text-cp-light-grey">Build Futuristic Dreams</p>
                    </div>
                </div>
    
                <div class="flex items-center justify-between w-full max-w-[180px]">
                    <a href="https://youtube.com" target="_blank">
                        <img src="{{ asset('assets/icons/youtube.svg') }}" class="w-5 h-5 object-contain" alt="YouTube">
                    </a>
                    <a href="https://wa.me/your-number" target="_blank">
                        <img src="{{ asset('assets/icons/whatsapp.svg') }}" class="w-5 h-5 object-contain" alt="WhatsApp">
                    </a>
                    <a href="https://facebook.com" target="_blank">
                        <img src="{{ asset('assets/icons/facebook.svg') }}" class="w-5 h-5 object-contain" alt="Facebook">
                    </a>
                    <a href="https://instagram.com" target="_blank">
                        <img src="{{ asset('assets/icons/instagram.svg') }}" class="w-5 h-5 object-contain" alt="Instagram">
                    </a>
                    <a href="https://tiktok.com" target="_blank">
                        <img src="{{ asset('assets/icons/tiktok.svg') }}" class="w-5 h-5 object-contain" alt="TikTok">
                    </a>
                </div>
                <div class="mt-2 text-center">
                    <p class="text-xs text-gray-500">&copy; {{ date('Y') }} Wilzio Internet Provider. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection

@push('styles')
<style>
    .whatsapp-button {
        background-color: #25D366;
        color: white;
        padding: 15px 40px; /* Increased padding for a more prominent look */
        border-radius: 50px; /* Fully rounded button */
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15); /* Stronger shadow for more depth */
        transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth transitions */
        font-size: 1.5rem; /* Increased font size for better readability */
        display: inline-flex; /* Ensures the button stays in a row format */
        align-items: center; /* Centers the text and icon vertically */
    }

    .whatsapp-button:hover {
        background-color: #128C7E;
        transform: translateY(-3px); /* Slight lift effect on hover */
    }

    .whatsapp-button i {
        font-size: 2rem; /* Bigger WhatsApp icon */
        margin-right: 10px;
    }

    @media (max-width: 640px) {
        .whatsapp-button {
            padding: 12px 30px; /* Slightly smaller padding for mobile */
            font-size: 1.25rem; /* Adjusted for smaller screens */
        }
    }
</style>
@endpush
