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
