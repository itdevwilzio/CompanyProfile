@php
  $payment_methods = config('app.payment_methods');
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
        <form action="{{ route('front.location_order_continue', $location) }}" method="post">
          @csrf
        <div class="mb-2">
          <label for="voucher_package" class="block text-sm font-medium text-gray-700">Jenis Voucher</label>
          <select id="voucher_package" name="voucher_package_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @foreach ($location->voucher_packages as $voucher)
              <option value="{{ $voucher->id }}">{{ $voucher->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-2">
          <label for="payment_method" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
          <select id="voucher_package" name="payment_method" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @foreach ($payment_methods as $pm)
              <option value="{{ $pm['bank_name'] }}">{{ $pm['bank_name'] }}</option>
            @endforeach
          </select>
        </div>
        <button class="bg-pimary hover:bg-pimary-dark text-white font-bold py-2 px-4 w-full rounded-md bg-primary mt-4">Lanjutkan</button>
      </form>
      </div>
    </div>
  </div>
  {{-- End Section Voucher --}}

  @endsection