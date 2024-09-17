@php
    $payment_methods = config('app.payment_methods');
    $payment_detail = $payment_methods[$selected_payment_method];
@endphp

@extends('front.layouts.app')
@section('content')
    <div id="header" class="relative">
        <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
            <x-navbar></x-navbar>
        </div>
    </div>

    {{-- Section Voucher --}}
    <div class="container mx-auto flex flex-col my-20 max-w-2xl text-white p-2">
        <h1 class="text-yellow-400 font-bold text-xl text-center mb-10">Beli Voucher Wi-Fi</h1>
        <div class="w-full flex flex-col justify-center items-center text-cp-black">
            <div class="rounded-t-xl bg-blue-200 py-2 px-10 w-80">
                <div class="w-full bg-pimary h-16 rounded-full overflow-hidden">
                    <img src="{{ asset('storage/' . $location->image) }}" class="w-full h-full object-cover" alt="">
                </div>
            </div>
            <div class="rounded-xl bg-blue-200 p-8 w-full flex flex-col">
                <form class="flex flex-col" action="{{ route('front.confirm_order_voucher', [$location, $voucher_package])}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="mb-5">
                    <label for="voucher_package" class="block font-medium text-gray-700">Rincian Pemesanan :</label>
                    <p class="text-center bg-white text-gray-900 p-1 rounded-md">
                        Lokasi : {{ $location->name }} <br>
                        Voucher : {{ $voucher_package->name }} <br>
                        Harga : Rp {{ $voucher_package->price }} <br>
                        Metode Bayar : {{ $selected_payment_method }}
                    </p>
                </div>
                <div class="mb-5">
                    <label for="payment_method" class="block font-medium text-gray-700">Nominal Bayar :</label>
                    <p class="text-center text-2xl font-bold text-primary p-1 rounded-md">
                        {{ formatRupiah($voucher_package->price) }}
                    </p>
                </div>
                <div class="mb-5">
                    <label for="payment_method" class="block font-medium text-gray-700">Silahkan Transfer ke :</label>
                    <p class="text-center bg-white text-gray-900 p-1 rounded-md">
                        {{ $selected_payment_method }} <br>
                        {!! nl2br(e($payment_detail)) !!}
                    </p>
                </div>

                <div class="mb-5">
                    <label for="payment_method" class="block font-medium text-gray-700">Upload Bukti Pembayaran :</label>
                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran"
                        class="bg-white w-full rounded-md file:text-white file:border-0 file:text-sm p-2 file:mr-5 file:m-0 file:bg file:bg-primary file:rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        accept="image/*" required>
                    <div class="mt-2 flex flex-col items-center justify-center">
                        <img id="upload-preview" src="" class="rounded-md w-full" alt="Preview" style="display: none; max-width: 100%; height: auto;">
                    </div>
                </div>
                <div class="mb-5">
                    <label for="whatsapp" class="block font-medium text-gray-700">Nomor Whatsapp :</label>
                    <input type="number" name="no_whatsapp" id="whatsapp" placeholder="Masukkan nomor Whatsapp" required class="mt-1 block w-full pl-3 pr-3 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 rounded-md">
                </div>
                <input type="hidden" name="payment_method" value="{{ $selected_payment_method }}">

                <button
                    class="bg-pimary hover:bg-pimary-dark text-white font-bold py-2 px-4 rounded-md bg-primary mt-4">Lanjutkan</button>
                </form>
            </div>
        </div>
    </div>
    {{-- End Section Voucher --}}
    <script>
        document.getElementById('bukti_pembayaran').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('upload-preview');
            
            if (file) {
                const reader = new FileReader();
    
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
    
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });
    </script>
@endsection
