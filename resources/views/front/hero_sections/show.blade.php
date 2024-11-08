@extends('front.layouts.app')

@section('content')
<style>
    /* Inline CSS for Navbar */
    .navbar {
        background-color: #ffffff; /* White background for visibility */
        color: #0E3995; /* Dark text for contrast */
        position: relative;
        z-index: 50; /* Ensures it sits above the wave container */
        padding: 1rem 0; /* Optional padding */
    }
</style>

<!-- Full Screen Wave and Particle Section -->
<div id="header" class="relative w-full overflow-hidden bg-[#0E3995]">
    <!-- Container for Carousel and Particles -->
    <div class="container max-w-[1130px] mx-auto relative pt-2 z-10 main-carousel">
        <!-- Navbar -->
        <div class="relative z-50"> <!-- Adjusting z-index for visibility -->
            <x-navbar class="navbar"></x-navbar> <!-- Apply .navbar class -->
        </div>

        <!-- Wave SVG Positioned Above the Carousel but outside the container -->
        <div class="wave-container w-full absolute top-0 left-0 z-[-1]">
            <!-- Wave SVG content -->
            <div class="bg-white h-20"></div>
            <svg width="100%" height="80px" id="svg" preserveAspectRatio="none" viewBox="0 0 1440 390" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150">
                <!-- SVG paths -->
            </svg>
        </div>
    </div>

    <!-- Centered Banner Content -->
    <div class="text-center max-w-4xl mx-auto relative pt-20">
        <img src="{{ Storage::url($heroSection->banner) }}" alt="Promotion Banner" class="object-cover w-full rounded-3xl pt-5">
        <h1 class="mt-8 text-5xl font-bold text-white">{!! $heroSection->heading !!}</h1>
        <p class="mt-4 text-lg text-white">{!! $heroSection->subheading !!}</p>
        <div class="mt-8 text-gray-300 text-justify">
            <p>{!! $heroSection->achievement !!}</p>
        </div>
    </div>
</div>
@endsection

@section('footer')
<!-- Footer Section -->
<footer class="w-full mt-10 bg-[#0E3995] text-white">
    <div class="container max-w-7xl mx-auto flex flex-col items-center justify-center py-10">
        <!-- Follow Us Section -->
        <p id="CompanyName" class="font-nunito font-bold text-lg mb-4">Ikuti Kami</p>
        <div class="flex items-center gap-6 mb-6">
            <!-- Social Media Icons -->
            <a href="https://www.facebook.com/share/GjZJNGmKbkjyumXs/" target="_blank">
                <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center transform hover:scale-110 transition-all duration-300 ease-in-out">
                    <svg class="w-5 h-5 text-[#0E3995] fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M22.675 0H1.325C.594 0 0 .594 0 1.326v21.348C0 23.406.594 24 1.326 24H12.82v-9.294H9.691V11.29h3.128V8.717c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.796.143v3.244l-1.918.001c-1.504 0-1.795.714-1.795 1.763v2.311h3.587l-.467 3.416h-3.12V24h6.116c.729 0 1.324-.594 1.324-1.326V1.326C24 .594 23.406 0 22.675 0z"/>
                    </svg>
                </div>
            </a>
            <!-- Other social icons... -->
        </div>
        <p class="text-sm text-white">&copy; {{ date('Y') }} wilzio.com</p>
    </div>
</footer>
@endsection
