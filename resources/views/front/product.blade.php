@extends('front.layouts.app')

@section('head')
    <meta name="description"
        content="Nikmati layanan WILZIO Home Internet dengan 3 langkah mudah. Pilih paket internet terbaik dan lakukan pemesanan dengan cepat.">
    <meta name="keywords"
        content="WILZIO, Home Internet, Internet Packages, Pemesanan Internet, Layanan Internet, Fast Internet">
    <meta name="author" content="Wilzio Internet Provider">
    <meta property="og:title" content="Wilzio Home Internet - Pilih Paket dan Pesan Sekarang">
    <meta property="og:description"
        content="Nikmati layanan WILZIO Home Internet dengan 3 langkah mudah. Pilih paket internet terbaik dan lakukan pemesanan dengan cepat.">
    <meta property="og:image" content="{{ asset('assets/icons/check.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('content')
    <div id="header" class="relative">
        <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
            <x-navbar></x-navbar>
        </div>
    </div>

    <!-- Main content area grows to fill the space -->
    <main class="flex-grow">
        <div id="Products" class="container mx-auto flex flex-col gap-20 mt-10 sm:mt-16 md:mt-12 lg:mt-10 xl:mt-8">
            <div class="container mx-auto px-4">
                <p class="text-center text-primary">Nikmati layanan WILZIO Home Internet dengan 3 langkah mudah</p>
                <div class="flex text-white mx-auto max-w-md justify-around items-center my-5">
                    <div data-step='1'
                        class="h-9 w-9 rounded-full border-[3px] border-primary flex items-center justify-center font-bold bg-primary text-white step-active">
                        1</div>
                    <div class="grow h-0.5 bg-gray-300"></div>
                    <div data-step='2'
                        class="h-9 w-9 rounded-full border-[3px] border-primary flex items-center justify-center font-bold bg-primary text-white">
                        2</div>
                    <div class="grow h-0.5 bg-gray-300"></div>
                    <div data-step='3'
                        class="h-9 w-9 rounded-full border-[3px] border-primary flex items-center justify-center font-bold bg-primary text-white">
                        3</div>
                </div>
                <div id="stepper" class="flex justify-center flex-col gap-8 items-center">
                    {{-- produk --}}
                    @if (session()->has('success_order'))
                        <div class="max-w-sm w-full flex flex-col items-center bg-white shadow-lg rounded-lg p-5">
                            <img src="/assets/icons/check.png" class="w-20 h-auto">
                            <h1 class="text-center font-bold mt-5">Permintaan Pemasangan Dikirim</h1>
                            <p class="text-center my-4">Kami akan segera menghubungi Anda</p>
                        </div>
                    @else
                        <div class="flex justify-center gap-3 flex-wrap" id="step-product">
                            @forelse ($products as $product)
                                <div class="product max-w-sm flex flex-col items-center bg-white shadow-lg rounded-lg overflow-hidden"
                                    data-product-id="{{ $product->id }}">
                                    <!-- Adjusted the width and height to make the images smaller squares -->
                                    <div class="max-w-sm h-auto flex overflow-hidden">
                                        <img src="{{ asset(Storage::url($product->thumbnail)) }}"
                                            class="object-cover w-full h-full rounded-lg" alt="{!! $product->name !!}"
                                            loading="lazy">
                                        <!-- Lazy loading the image -->
                                    </div>
                                    <div class="flex flex-col gap-4 p-4 text-center w-full px-8">
                                        <p
                                            class="badge bg-cp-pale-blue text-cp-light-blue p-2 rounded-full uppercase font-bold text-sm">
                                            {{ $product->tagline }}
                                        </p>
                                        <h2 class="font-bold text-lg">{!! $product->name !!}</h2>
                                        <p class="text-cp-light-grey whitespace-pre-wrap">{!! $product->about !!}</p>
                                        <button onclick="selectProduct({!! $product->id !!})"
                                            class="btn-pilih-paket bg-primary p-3 w-full rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out font-bold text-white">
                                            Pilih Paket
                                        </button>

                                    </div>
                                </div>
                            @empty
                                <p class="col-span-full text-center">Belum ada data terbaru</p>
                            @endforelse
                        </div>
                        {{-- Step Pemesanan --}}
                        <div class="max-w-md w-full hidden" id="form-pemesanan">
                            <form action="{{ route('front.order_product') }}" enctype="multipart/form-data" method="post"
                                class="bg-white rounded-xl p-8 flex flex-col">
                                @csrf
                                <input type="hidden" name="product_id" value="" id="product_id">

                                <!-- Nama Lengkap -->
                                <label for="nama" class="text-primary font-medium mb-1">Nama Lengkap</label>
                                <input type="text" id="nama" name="nama" required
                                    class="rounded-full mb-3 bg-primary text-white py-3 px-4 border-white placeholder-gray-200"
                                    placeholder="Masukkan nama lengkap sesuai KTP">

                                <!-- Nomor Whatsapp -->
                                <label for="no_wa" class="text-primary font-medium mb-1">Nomor Whatsapp</label>
                                <input type="tel" id="no_wa" name="no_wa" required pattern="[0-9]*"
                                    inputmode="numeric"
                                    class="rounded-full mb-3 bg-primary text-white py-3 px-4 border-white placeholder-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    placeholder="Masukkan nomor Whatsapp" aria-label="Nomor Whatsapp" />


                                <!-- Foto KTP -->
                                <label for="foto_ktp" class="text-primary font-medium mb-1">Foto KTP</label>
                                <input type="file" id="foto_ktp" name="foto_ktp" required
                                    class="file:bg-white file:rounded-full file:border-none file:px-3 rounded-full mb-3 bg-primary text-white py-3 px-4 border-white placeholder-gray-200"
                                    accept="image/*" placeholder="Upload foto KTP">

                                <!-- Preview Image -->
                                <img id="preview" class="w-full h-auto rounded-xl mt-3 hidden" />

                                <!-- Buttons: Batal & Selanjutnya -->
                                <div class="flex gap-4 mt-5">
                                    <!-- Cancel Button -->
                                    <button type="button"
                                        class="w-full p-3 bg-red-600 text-white rounded-full shadow-[0_4px_0_rgba(0,0,0,0.4)] hover:translate-y-[4px] hover:shadow-[0_2px_0_rgba(0,0,0,0.4)] active:bg-red-700 transition-all duration-300 ease-in-out"
                                        onclick="backToStep1()">Batal</button>

                                    <!-- Next Button -->
                                    <button type="submit"
                                        class="w-full p-3 bg-green-600 text-white rounded-full shadow-[0_4px_0_rgba(0,0,0,0.4)] hover:translate-y-[4px] hover:shadow-[0_2px_0_rgba(0,0,0,0.4)] active:bg-green-700 transition-all duration-300 ease-in-out">Selanjutnya</button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
    </main>
    {{-- End Section Product --}}



    <!-- Product Modal -->
    <div id="productModal" class="fixed inset-0 hidden z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 text-center">
            <div class="relative bg-white rounded-lg shadow-xl w-full max-w-lg p-6 text-left">
                <!-- Modal close button -->
                <button id="closeModal" class="absolute top-0 right-0 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <!-- Modal content -->
                <div id="modalContent" class="flex flex-col gap-4">
                    <div class="w-full h-[150px] overflow-hidden rounded-lg">
                        <img id="modalThumbnail" src="" alt="Product Image" class="object-cover w-full h-full">
                    </div>
                    <h2 id="modalName" class="text-xl font-bold"></h2>
                    <p id="modalAbout" class="text-gray-700"></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->

    <footer class="w-full mt-10 bg-[#0E3995] text-white">
        <div class="container max-w-7xl mx-auto flex flex-col items-center justify-center py-10">
            <!-- Follow Us Section -->
            <p id="CompanyName" class="font-nunito font-bold text-lg mb-4">
                Ikuti Kami
            </p>
            <div class="flex items-center gap-6 mb-6">
                <a href="https://www.facebook.com/share/GjZJNGmKbkjyumXs/">
                    <div
                        class="w-10 h-10 rounded-full bg-white flex items-center justify-center transform hover:scale-110 transition-all duration-300 ease-in-out">
                        <svg class="w-5 h-5 text-[#0E3995] fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M22.675 0H1.325C.594 0 0 .594 0 1.326v21.348C0 23.406.594 24 1.326 24H12.82v-9.294H9.691V11.29h3.128V8.717c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.796.143v3.244l-1.918.001c-1.504 0-1.795.714-1.795 1.763v2.311h3.587l-.467 3.416h-3.12V24h6.116c.729 0 1.324-.594 1.324-1.326V1.326C24 .594 23.406 0 22.675 0z" />
                        </svg>
                    </div>
                </a>
                <a href="https://www.instagram.com/official.wilzio/profilecard/?igsh=MW9zazBtYjhmaGEyNg==">
                    <div
                        class="w-10 h-10 rounded-full bg-white flex items-center justify-center transform hover:scale-110 transition-all duration-300 ease-in-out">
                        <svg class="w-5 h-5 text-[#0E3995] fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 2.163c3.204 0 3.584.012 4.849.07 1.366.062 2.633.334 3.608 1.309.975.976 1.247 2.243 1.309 3.608.058 1.265.07 1.645.07 4.849s-.012 3.584-.07 4.849c-.062 1.366-.334 2.633-1.309 3.608-.976.975-2.243 1.247-3.608 1.309-1.265.058-1.645.07-4.849.07s-3.584-.012-4.849-.07c-1.366-.062-2.633-.334-3.608-1.309-.975-.976-1.247-2.243-1.309-3.608-.058-1.265-.07-1.645-.07-4.849s.012-3.584.07-4.849c.062-1.366.334-2.633 1.309-3.608.976-.975 2.243-1.247 3.608-1.309 1.265-.058 1.645-.07 4.849-.07m0-2.163C8.755 0 8.333.014 7.052.072 5.766.129 4.557.352 3.607 1.302 2.656 2.253 2.433 3.461 2.376 4.747.418 8.302.418 15.698 2.376 19.253c.057 1.286.28 2.494 1.231 3.444.95.951 2.159 1.173 3.445 1.23 1.281.058 1.703.072 4.848.072s3.567-.014 4.848-.072c1.286-.057 2.494-.279 3.445-1.23.951-.95 1.174-2.158 1.231-3.444.058-1.281.072-1.703.072-4.848s-.014-3.567-.072-4.848c-.057-1.286-.28-2.494-1.231-3.444-.951-.951-2.159-1.173-3.445-1.23-1.281-.058-1.703-.072-4.848-.072zm0 5.838c-3.403 0-6.163 2.76-6.163 6.163s2.76 6.163 6.163 6.163 6.163-2.76 6.163-6.163-2.76-6.163-6.163-6.163zm0 10.123c-2.185 0-3.96-1.775-3.96-3.96s1.775-3.96 3.96-3.96 3.96 1.775 3.96 3.96-1.775 3.96-3.96 3.96zm6.406-11.845c-.796 0-1.443-.647-1.443-1.443s.647-1.443 1.443-1.443 1.443.647 1.443 1.443-.647 1.443-1.443 1.443z" />
                        </svg>
                    </div>
                </a>
                <a href="https://wa.me/6285179709387" rel="noopener noreferrer">
                    <div
                        class="w-10 h-10 rounded-full bg-white flex items-center justify-center transform hover:scale-110 transition-all duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#0E3995] fill-current"
                            viewBox="0 0 32 32">
                            <path fill="currentColor"
                                d="M16.002 0C7.164 0 0 7.164 0 16c0 3.074.838 6.06 2.429 8.678l-1.621 6.055a1.177 1.177 0 0 0 1.427 1.427l6.055-1.621A15.946 15.946 0 0 0 16.002 32c8.836 0 16-7.164 16-16 0-8.836-7.164-16-16-16zm9.373 23.873c-.401 1.129-2.012 2.145-2.769 2.243-.756.098-1.429.512-4.827-.998-4.074-1.795-6.616-6.322-6.813-6.619-.197-.295-1.63-2.168-1.63-4.131 0-1.964 1.037-2.936 1.402-3.34.365-.404.803-.512 1.071-.512.268 0 .536.001.768.014.238.015.564-.09.888.677.324.768 1.103 2.658 1.202 2.853.099.197.164.438.014.731-.148.295-.223.473-.438.768-.217.295-.46.66-.64.883-.218.275-.444.573-.193.945.25.372 1.109 1.822 2.383 2.945 1.641 1.454 2.988 1.926 3.368 2.13.379.205.599.184.821-.11.223-.295 1.027-1.25 1.301-1.68.274-.43.547-.357.914-.223.367.134 2.339 1.102 2.744 1.29.405.188.677.29.776.451.1.163.1.965-.301 2.094z" />
                        </svg>
                    </div>
                </a>
                <a href="https://www.youtube.com/@official.wilzio">
                    <div
                        class="w-10 h-10 rounded-full bg-white flex items-center justify-center transform hover:scale-110 transition-all duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#0E3995] fill-current"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M23.499 6.203c-.273-1.032-1.077-1.837-2.109-2.109C19.528 3.5 12 3.5 12 3.5s-7.528 0-9.39.594c-1.032.273-1.837 1.077-2.109 2.109C0 8.064 0 12 0 12s0 3.936.501 5.797c.273 1.032 1.077 1.837 2.109 2.109C4.472 20.5 12 20.5 12 20.5s7.528 0 9.39-.594c1.032-.273 1.837-1.077 2.109-2.109.501-1.861.501-5.797.501-5.797s0-3.936-.501-5.797zm-13.908 9.44V8.358l6.253 3.643-6.253 3.642z" />
                        </svg>
                    </div>
                </a>
                <a href="https://www.tiktok.com/@official.wilzio?_t=8qmDlonzcQ5&_r=1">
                    <div
                        class="w-10 h-10 rounded-full bg-white flex items-center justify-center transform hover:scale-110 transition-all duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#0E3995] fill-current"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.245V2h-3.445v13.672a2.896 2.896 0 0 1-5.201 1.743l-.002-.001.002.001a2.895 2.895 0 0 1 3.183-4.51v-3.5a6.329 6.329 0 0 0-5.394 10.692 6.33 6.33 0 0 0 10.857-4.424V8.687a8.182 8.182 0 0 0 4.773 1.526V6.79a4.831 4.831 0 0 1-1.003-.104z" />
                        </svg>
                    </div>
                </a>
            </div>
            <!-- Copyright Section -->
            <p class="text-sm text-white">
                &copy; {{ date('Y') }} wilzio.com - All Rights Reserved
        </div>
    </footer>
    </div>
@endsection

@push('after-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script src="{{ asset('js/accordion.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="{{ asset('js/modal-video.js') }}"></script>
    <script>
        let step = 1;

        function selectProduct(id) {
            // When in step 1 and product is selected
            if (step == 1) {
                $('#product_id').val(id);
                $('[data-product-id]').each(function() {
                    if (id != $(this).data('product-id')) {
                        $(this).hide(400); // Hide all products except selected one
                    }
                });
                changeStep2(); // Move to step 2
            } else {
                // If in step 2 and the button is "Batal", show all products again and return to step 1
                $('[data-product-id]').each(function() {
                    $(this).show(400); // Show all products again
                });
                backToStep1(); // Return to step 1
            }
        }

        function changeStep2() {
            // If the button text is "Batal", meaning user is in step 2 and wants to cancel
            if ($('.btn-pilih-paket').text() === 'Batal') {
                backToStep1(); // Move back to step 1 when canceling
            } else {
                // Move to step 2
                step = 2;
                $('[data-step]').each(function() {
                    if (step == $(this).data('step')) {
                        $(this).addClass('step-active');
                        $('#form-pemesanan').slideDown(400); // Show the form for step 2
                        $('.btn-pilih-paket').addClass("hidden").text('Batal'); // Change button text to "Batal"
                    } else {
                        $(this).removeClass('step-active');
                    }
                });
            }
        }

        // Function to return to step 1
        function backToStep1() {
            step = 1;
            $('[data-step]').each(function() {
                if (step == $(this).data('step')) {
                    $(this).addClass('step-active');
                    $('#form-pemesanan').slideUp(400); // Hide the form when going back to step 1
                    $('.btn-pilih-paket').removeClass("hidden").text(
                    'Pilih Paket'); // Change button text back to "Pilih Paket"
                } else {
                    $(this).removeClass('step-active');
                }
            });
            $('[data-product-id]').each(function() {
                $(this).show(400); // Show all products again
            });
        }

        // Function to explicitly set a step
        function setStep(s) {
            $('[data-step]').each(function() {
                console.log($(this).data('step'))
                if (s == $(this).data('step')) {
                    $(this).addClass('step-active');
                } else {
                    $(this).removeClass('step-active');
                }
            });
        }


        @if (session()->has('success_order'))
            setStep(3);
        @endif

        document.getElementById('foto_ktp').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden'); // Show the preview image
                };
                reader.readAsDataURL(file); // Read the image file
            } else {
                preview.src = ''; // Clear preview if no file selected
                preview.classList.add('hidden'); // Hide the image
            }
        });
    </script>
@endpush
