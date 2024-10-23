@extends('layouts.app')

@section('content')
    <!-- Born For Indonesia Section -->
    <section id="born-for-indonesia" class="w-full py-16 bg-primary relative overflow-hidden">
        <div class="container max-w-[1140px] mx-auto flex flex-col lg:flex-row items-center gap-10">
            <!-- Text Section -->
            <div class="w-full lg:w-1/2 text-white lg:pr-10">
                <h2 class="font-nunito font-bold text-4xl mb-6">{{ $aboutSections->where('type', 'Visions')->first()->name }}</h2>
                <p class="font-nunito text-base leading-7 mb-8">
                    {!! $aboutSections->where('type', 'Visions')->first()->description !!}
                </p>
            </div>

            <!-- Image Section -->
            <div class="w-full lg:w-1/2 flex justify-center lg:justify-end relative">
                <div class="rounded-xl overflow-hidden shadow-2xl transform transition-transform duration-300 hover:scale-105">
                    <img src="{{ Storage::url($aboutSections->where('type', 'Visions')->first()->thumbnail) }}" class="object-cover w-full h-full" alt="Vision Image">
                </div>
            </div>
        </div>
    </section>

    <!-- Identitas Produk Section -->
    <section id="product-identity" class="w-full py-16">
        <div class="container max-w-[1130px] mx-auto flex flex-col lg:flex-row items-center lg:items-start gap-10">
            <!-- Logo Section with Hover Effect -->
            <div class="relative w-full lg:w-1/2 text-white flex justify-center items-center bg-white p-4 rounded-lg">
                <img src="{{ asset('assets/teams/logo-Biru-V2.png') }}" class="object-contain w-full rounded-lg transition-transform duration-300 hover:scale-105 shadow-custom filter brightness-150" alt="Wija Backbone Logo">
            </div>
            
            <!-- Description Section -->
            <div class="w-full lg:w-1/2 text-primary lg:text-left flex flex-col justify-center transition-all duration-300 hover:text-black">
                <h2 class="font-nunito font-bold text-4xl mb-2">{{ $aboutSections->where('type', 'Missions')->first()->name }}</h2>
                <p class="text-lg leading-7 mb-2">{{ $aboutSections->where('type', 'Missions')->first()->description }}</p>

                <!-- Keypoints Section -->
                <ul class="list-disc ml-5 mt-3 text-lg leading-7">
                    @foreach($aboutSections->where('type', 'Missions')->first()->keypoints as $keypoint)
                        <li>{{ $keypoint }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <!-- APJII Certification Section -->
    <section id="apjii-registration" class="w-full py-16 bg-primary relative overflow-hidden">
        <div class="container max-w-[1130px] mx-auto flex flex-col lg:flex-row items-center gap-10">
            <!-- Text Section with Hover Effect -->
            <div class="w-full lg:w-1/2 text-white transition-all duration-300 hover:text-black">
                <h2 class="font-nunito font-bold text-4xl mb-4">Resmi Terdaftar di APJII</h2>
                <p class="text-lg leading-7 mb-4">
                    Kami telah terdaftar secara resmi sebagai Penyedia Layanan Internet (ISP) di Asosiasi Penyelenggara Jasa Internet Indonesia (APJII).
                </p>
            </div>
            <!-- Image Section with Hover Effect -->
            <div class="w-full lg:w-1/2 flex justify-center">
                <div class="relative w-full aspect-[13/7]">
                    <img src="{{ asset('assets/teams/APJII.png') }}" class="object-contain w-full rounded-lg transition-transform duration-300 hover:scale-105 shadow-custom" alt="APJII Logo">
                </div>
            </div>
        </div>
    </section>

    <!-- Super Team Section -->
    <section id="super-team" class="w-full py-16">
        <div class="container max-w-[1130px] mx-auto flex flex-col lg:flex-row items-center gap-10">
            <!-- Image Section with Hover Effect -->
            <div class="w-full lg:w-1/2 flex justify-center">
                <img src="{{ asset('assets/teams/Thank-min.png') }}" class="object-contain w-full rounded-lg transition-transform duration-300 hover:scale-105" alt="Super Team Image">
            </div>
            <!-- Text Section with Hover Effect -->
            <div class="w-full lg:w-1/2 text-primary lg:text-right transition-all duration-300 hover:text-black">
                <h2 class="font-nunito font-bold text-4xl mb-4">Super Team</h2>
                <p class="text-lg leading-7 mb-4">
                    Tim kami yang solid dan profesional menggunakan teknologi terkini untuk memberikan layanan internet yang berkualitas.
                </p>
            </div>
        </div>
    </section>
@endsection
