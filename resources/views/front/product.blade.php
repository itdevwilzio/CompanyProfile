@extends('front.layouts.app')
@section('content')
  <div id="header" class="relative overflow-hidden">
    <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
      <x-navbar></x-navbar>
    </div>
  </div>
  {{-- @section('content')
    <div id="header" class="bg-[#F6F7FA] relative overflow-hidden">
        <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
            <x-navbar></x-navbar>
            @forelse ($hero_section as $hero)
                <input type="hidden" name="path_video" id="path_video" value="{{ $hero->path_video }}">
                <div id="Hero" class="flex flex-col gap-[30px] mt-20 pb-20">
                    <div class="flex items-center bg-white p-[8px_16px] gap-[10px] rounded-full w-fit">
                        <div class="flex w-5 h-5 overflow-hidden shrink-0">
                            <img src="{{ asset('assets/icons/crown.svg') }}" class="object-contain" alt="icon">
                        </div>
                        <p class="text-sm font-semibold">{{ $hero->achievement }}</p>
                    </div>
                    <div class="flex flex-col gap-[10px]">
                        <h1 class="font-extrabold text-[50px] leading-[65px] max-w-[536px]">{{ $hero->heading }}</h1>
                        <p class="text-cp-light-grey leading-[30px] max-w-[437px]">{{ $hero->subheading }}</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <a href=""
                            class="bg-cp-dark-blue p-5 w-fit rounded-xl hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300 font-bold text-white">Explore
                            Now</a>
                        <button class="bg-cp-black p-5 w-fit rounded-xl font-bold text-white flex items-center gap-[10px]"
                            onclick="{modal.show()}">
                            <div class="flex w-6 h-6 overflow-hidden shrink-0">
                                <img src="{{ asset('assets/icons/play-circle.svg') }}" class="object-contain w-full h-full"
                                    alt="icon">
                            </div>
                            <span>Watch Video</span>
                        </button>
                    </div>
                </div>
        </div>
        <div class="absolute w-[43%] h-full top-0 right-0 overflow-hidden z-0">
            <img src="{{ asset(Storage::url($hero->banner)) }}" class="object-cover w-full h-full" alt="banner">
        </div>
    @empty
        @endforelse
    </div>




    {{-- <div id="Clients" class="container max-w-[1130px] mx-auto flex flex-col justify-center text-center gap-5 mt-20">
        <h2 class="text-lg font-bold">Trusted by 500+ Top Leaders Worldwide</h2>
        <div class="flex flex-wrap justify-center gap-5 logo-container">
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-54.svg') }}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-52.svg') }}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-55.svg') }}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-44.svg') }}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-51.svg') }}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-55.svg') }}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-52.svg') }}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-54.svg') }}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
            <div
                class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-51.svg') }}" class="object-contain w-full h-full" alt="logo">
                </div>
            </div>
        </div>
    </div> --}}
  {{-- <div id="OurPrinciples" class="container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">
        <div class="flex items-center justify-between">
            <div class="flex flex-col gap-[14px]">
                <p
                    class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">
                    OUR PRINCIPLES</p>
                <h2 class="font-bold text-4xl leading-[45px]">We Might Best Choice <br> For Your Company</h2>
            </div>
            <a href="" class="bg-cp-black p-[14px_20px] w-fit rounded-xl font-bold text-white">Explore More</a>
        </div>
        <div class="flex flex-wrap items-center gap-[30px] justify-center">
            @forelse ($principles as $principle)
                <div
                    class="card w-[356.67px] flex flex-col bg-white border border-[#E8EAF2] rounded-[20px] gap-[30px] overflow-hidden hover:border-cp-dark-blue transition-all duration-300">
                    <div class="thumbnail h-[200px] flex shrink-0 overflow-hidden">
                        <img src="{{ asset(Storage::url($principle->thumbnail)) }}"
                            class="object-cover object-center w-full h-full" alt="thumbnails">
                    </div>
                    <div class="flex flex-col p-[0_30px_30px_30px] gap-5">
                        <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
                            <img src="{{ asset(Storage::url($principle->icon)) }}" class="object-contain w-full h-full"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="title font-bold text-xl leading-[30px]">{{ $principle->name }}</p>
                            <p class="leading-[30px] text-cp-light-grey">{{ $principle->subtitle }}</p>
                        </div>
                        <a href="" class="font-semibold text-cp-dark-blue">Learn More</a>
                    </div>
                </div>
            @empty
                <p>Belum ada data terbaru</p>
            @endforelse
        </div>
    </div> --}}
  {{-- <div id="Stats" class="w-full mt-20 bg-cp-black">
        <div class="container max-w-[1000px] mx-auto py-10">
            <div class="flex flex-wrap items-center justify-between p-[10px]">
                @forelse ($statistics as $statistic)
                    <div class="card w-[200px] flex flex-col items-center gap-[10px] text-center">
                        <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
                            <img src="{{ asset(Storage::url($statistic->icon)) }}" class="object-contain w-full h-full"
                                alt="icon">
                        </div>
                        <p class="text-cp-pale-orange font-bold text-4xl leading-[54px]">{{ $statistic->goal }}</p>
                        <p class="text-cp-light-grey">{{ $statistic->name }}</p>
                    </div>
                @empty
                    <p>Belum ada data terbaru</p>
                @endforelse
            </div>
        </div>
    </div> --}}

  <div id="Products" class="container mx-auto flex flex-col gap-20 mt-20">
    <div class="container mx-auto px-4">
      <p class="text-center text-gray-200">Nikmati layanan home internet dengan 3 langkah mudah</p>
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
              <button type="submit" class="w-full p-3 bg-green-600 mt-5 text-white rounded-full">Selanjutnya</button>
            </form>
          </div>
        @endif
      </div>
    </div>
  </div>

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

  <!-- Modal overlay -->
  <div id="modalOverlay" class="hidden fixed inset-0 bg-black opacity-50 z-40"></div>

  <footer class="relative w-full mt-20 overflow-hidden bg-cp-black">
    <div
      class="container max-w-[1130px] mx-auto flex flex-wrap gap-y-4 items-center justify-center pt-[100px] pb-[220px] relative z-10">
      <div class="flex flex-col gap-10 items-start">
        <!-- Company Logo and Info -->
        <div class="flex items-center gap-3">
          <div class="flex shrink-0 h-[43px] overflow-hidden">
            <img src="{{ asset('assets/logo/logo.svg') }}" class="object-contain w-full h-full" alt="Company logo">
          </div>
          <div class="flex flex-col">
            <p id="CompanyName" class="font-extrabold text-xl leading-[30px] text-white">Wilzio</p>
            <p id="CompanyTagline" class="text-sm text-cp-light-grey">Build Futuristic Dreams</p>
          </div>
        </div>

        <!-- Social Media Icons -->
        <div class="flex items-center justify-center gap-4">
          <a href="https://youtube.com" target="_blank">
            <div class="flex w-6 h-6 overflow-hidden shrink-0">
              <img src="{{ asset('assets/icons/youtube.svg') }}" class="object-contain w-full h-full" alt="YouTube">
            </div>
          </a>
          <a href="https://wa.me/your-number" target="_blank">
            <div class="flex w-6 h-6 overflow-hidden shrink-0">
              <img src="{{ asset('assets/icons/whatsapp.svg') }}" class="object-contain w-full h-full" alt="WhatsApp">
            </div>
          </a>
          <a href="https://facebook.com" target="_blank">
            <div class="flex w-6 h-6 overflow-hidden shrink-0">
              <img src="{{ asset('assets/icons/facebook.svg') }}" class="object-contain w-full h-full" alt="Facebook">
            </div>
          </a>
          <a href="https://instagram.com" target="_blank">
            <div class="flex w-6 h-6 overflow-hidden shrink-0">
              <img src="{{ asset('assets/icons/instagram.svg') }}" class="object-contain w-full h-full"
                alt="Instagram">
            </div>
          </a>
        </div>
      </div>

      {{-- <div class="flex flex-wrap gap-[50px]">
                <div class="flex flex-col w-[200px] gap-3">
                    <p class="text-lg font-bold text-white">Products</p>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">General
                        Contract</a>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">Building
                        Assessment</a>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">3D Paper
                        Builder</a>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">Legal
                        Constructions</a>
                </div>
                <div class="flex flex-col w-[200px] gap-3">
                    <p class="text-lg font-bold text-white">About</p>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">We’re
                        Hiring</a>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">Our Big
                        Purposes</a>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">Investor
                        Relations</a>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">Media
                        Press</a>
                </div>
                <div class="flex flex-col w-[200px] gap-3">
                    <p class="text-lg font-bold text-white">Useful Links</p>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">Privacy
                        & Policy</a>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">Terms &
                        Conditions</a>
                    <a href="contact.html" class="transition-all duration-300 text-cp-light-grey hover:text-white">Contact
                        Us</a>
                    <a href="" class="transition-all duration-300 text-cp-light-grey hover:text-white">Download
                        Template</a>
                </div>
            </div> --}}
    </div>
    <div class="absolute -bottom-[135px] w-full">
      <p class="font-extrabold text-[250px] leading-[375px] text-center text-white opacity-5">WILZIO</p>
    </div>
  </footer>
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
    // const products = document.querySelectorAll('.product');
    // const modal = document.getElementById('productModal');
    // const modalOverlay = document.getElementById('modalOverlay');
    // const modalName = document.getElementById('modalName');
    // const modalAbout = document.getElementById('modalAbout');
    // const modalThumbnail = document.getElementById('modalThumbnail');
    // const closeModal = document.getElementById('closeModal');

    // Open modal when a product is clicked
    // products.forEach(product => {
    //     product.addEventListener('click', function() {
    //         const productName = this.getAttribute('data-product-name');
    //         const productAbout = this.getAttribute('data-product-about');
    //         const productThumbnail = this.getAttribute('data-product-thumbnail');

    //         // Set modal content
    //         modalName.textContent = productName;
    //         modalAbout.textContent = productAbout;
    //         modalThumbnail.src = productThumbnail;

    //         // Show modal and overlay
    //         modal.classList.remove('hidden');
    //         modalOverlay.classList.remove('hidden');
    //     });
    // });

    // Close modal
    // closeModal.addEventListener('click', function() {
    //     modal.classList.add('hidden');
    //     modalOverlay.classList.add('hidden');
    // });

    // Close modal when clicking outside the modal
    // modalOverlay.addEventListener('click', function() {
    //     modal.classList.add('hidden');
    //     modalOverlay.classList.add('hidden');
    // });
    let step = 1;

    function selectProduct(id) {
      if (step == 1) {
        $('#product_id').val(id);
        $('[data-product-id]').each(function() {
          if (id != $(this).data('product-id')) {
            $(this).hide(400);
            changeStep2();
          }
        })
      } else {
        $('[data-product-id]').each(function() {
          $(this).show(400);
        });
        backToStep1();
      }
    }

    function changeStep2() {
      step = 2;
      $('[data-step]').each(function() {
        console.log($(this).data('step'))
        if (step == $(this).data('step')) {
          $(this).addClass('step-active');
          $('#form-pemesanan').slideDown(400)
          $('.btn-pilih-paket').text('Batal');
        } else {
          $(this).removeClass('step-active');
        }

      })
    }

    function setStep(s) {
      $('[data-step]').each(function() {
        console.log($(this).data('step'))
        if (s == $(this).data('step')) {
          $(this).addClass('step-active');
        } else {
          $(this).removeClass('step-active');
        }
      })
    }

    function backToStep1() {
      step = 1;
      $('[data-step]').each(function() {
        if (step == $(this).data('step')) {
          $(this).addClass('step-active');
          $('#form-pemesanan').slideUp(400)
          $('.btn-pilih-paket').text('Pilih Paket');
        } else {
          $(this).removeClass('step-active');
        }

      })
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
