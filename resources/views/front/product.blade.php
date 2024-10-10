@extends('front.layouts.app')
@section('content')
    <div id="header" class="relative">
        <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
            <x-navbar></x-navbar>
        </div>
    </div>

  <div id="Products" class="container mx-auto flex flex-col gap-20 mt-20">
    <div class="container mx-auto px-4">
      <p class="text-center text-gray-200">Nikmati layanan WILZIO Home Internet dengan 3 langkah mudah</p>
      <div class="flex text-white mx-auto max-w-md justify-around items-center my-5">
        <div data-step='1'
          class="h-9 w-9 rounded-full border-[3px] border-white flex items-center justify-center font-bold bg-white text-blue-500 step-active">
          1</div>
        <div class="grow h-0.5 bg-gray-300"></div>
        <div data-step='2'
          class="h-9 w-9 rounded-full border-[3px] border-white flex items-center justify-center font-bold bg-white text-blue-500">
          2</div>
        <div class="grow h-0.5 bg-gray-300"></div>
        <div data-step='3'
          class="h-9 w-9 rounded-full border-[3px] border-white flex items-center justify-center font-bold bg-white text-blue-500">
          3</div>
      </div>
      <div id="stepper" class="flex justify-center flex-col gap-8 items-center">
        {{-- produk --}}
        @if (session()->has('success_order'))
        <div class="max-w-sm w-full flex flex-col items-center bg-white shadow-lg rounded-lg p-5">
            <img src="/assets/icons/check.png" class="w-20 h-auto">
            <h1 class="text-center font-bold mt-5">Permintan Pemasangan Dikirim</h1>
            <p class="text-center my-4">Kami akan segera menghubungi Anda</p>
          </div>
        @else
          <div class="flex justify-center gap-3 flex-wrap" id="step-product">
            @forelse ($products as $product)
              <div class="product max-w-sm flex flex-col items-center bg-white shadow-lg rounded-lg overflow-hidden"
                data-product-id="{{ $product->id }}">
                <!-- Adjusted the width and height to make the images smaller squares -->
                <div class="max-w-sm h-auto flex overflow-hidden">
                  <img src="{{ asset(Storage::url($product->thumbnail)) }}" class="object-cover w-full h-full rounded-lg"
                    alt="{{ $product->name }}" loading="lazy">
                  <!-- Lazy loading the image -->
                </div>
                <div class="flex flex-col gap-4 p-4 text-center w-full px-8">
                  <p class="badge bg-cp-pale-blue text-cp-light-blue p-2 rounded-full uppercase font-bold text-sm">
                    {{ $product->tagline }}
                  </p>
                  <h2 class="font-bold text-lg">{{ $product->name }}</h2>
                  <p class="text-cp-light-grey whitespace-pre-wrap">{{ $product->about }}</p>
                  <button onclick="selectProduct({{ $product->id }})"
                    class="btn-pilih-paket bg-primary p-3 w-full rounded-full hover:shadow-lg transition-all duration-300 font-bold text-white">
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
              <label for="nama" class="text-primary font-medium mb-1">Nama Lengkap</label>
              <input type="text" id="nama" name="nama" required
                class="rounded-full mb-3 bg-primary text-white py-3 px-4 border-white placeholder-gray-200"
                placeholder="Masukkan nama lengkap sesuai KTP">
              <label for="no_wa" class="text-primary font-medium mb-1">Nomor Whatsapp</label>
              <input type="tel" id="no_wa" name="no_wa" required
                class="rounded-full mb-3 bg-primary text-white py-3 px-4 border-white placeholder-gray-200"
                placeholder="Masukkan nomor Whatsapp">
              <label for="foto_ktp" class="text-primary font-medium mb-1">Foto KTP</label>
              <input type="file" id="foto_ktp" name="foto_ktp" required
                class="file:bg-white file:rounded-full file:border-none file:px-3 rounded-full mb-3 bg-primary text-white py-3 px-4 border-white placeholder-gray-200"
                accept="image/*" placeholder="Upload foto KTP">
                <!-- Preview Image -->
                <img id="preview" class="w-full h-auto rounded-xl mt-3 hidden" />
                <!-- Buttons: Batal & Selanjutnya -->
                <div class="flex gap-4 mt-5">
                    <button type="button" class="w-1/2 p-3 bg-primary text-white rounded-full">Batal</button>
                    <button type="submit" class="w-1/2 p-3 bg-green-600 text-white rounded-full">Selanjutnya</button>
                </div>
            </form>
          </div>
        @endif
      </div>
    </div>
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
                        $('.btn-pilih-paket').text('Batal'); // Change button text to "Batal"
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
                    $('.btn-pilih-paket').text('Pilih Paket'); // Change button text back to "Pilih Paket"
                } else {
                    $(this).removeClass('step-active');
                }
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
