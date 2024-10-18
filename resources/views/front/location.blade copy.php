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
    //show link whatsapp number


    {{-- <div class="w-full flex flex-col">
      <form action="{{ route('front.location') }}" method="get">
      <input type="text" class="bg-white w-full rounded mb-8 text-gray-800" value="{{ request('search') }}" name="search" placeholder="Masukkan nama lokasi atau Wi-Fi Anda">
    </form>

      <p class="text-center mb-4">Atau, pilih sesuai dengan logo Wi-Fi Anda</p>
      <div class="grid grid-cols-[repeat(auto-fit,minmax(140px,1fr))] gap-2 justify-center">
        @foreach ($locations as $location)
          <a href="{{ route('front.location_order', $location->id) }}" class="bg-white p-4 rounded-xl flex flex-col items-center min-w-32 mx-auto text-primary hover:scale-105 transition-all duration-300">
            <div class="bg-primary text-white rounded-full h-10 w-full mb-2 text-xs flex items-center justify-center overflow-hidden">
                <img src="{{ asset('storage/' . $location->image) }}" alt="" class="w-full h-full object-cover">
            </div>
            <p class="w-full text-center text-sm" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
              {{ $location->name }}
            </p>
          </a>
        @endforeach
        @if($locations->count() == 0)
        <p class="text-center">Tidak ada data</p>
        @endif
      </div>


    </div> --}}
  </div>
  {{-- End Section Voucher --}}

  @endsection