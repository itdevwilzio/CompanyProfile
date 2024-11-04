<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Hero Section') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="p-10 overflow-hidden bg-white shadow-sm sm:rounded-lg">

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="w-full py-3 text-white bg-red-500 rounded-3xl">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <form id="hero-section-form" method="POST" action="{{ route('admin.hero_sections.update', $heroSection) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Heading Input -->
                    <div>
                        <x-input-label for="heading" :value="__('Heading')" />
                        <x-text-input id="heading" class="block w-full mt-1" type="text" name="heading"
                            value="{{ old('heading', $heroSection->heading) }}" required autofocus autocomplete="heading" />
                        <x-input-error :messages="$errors->get('heading')" class="mt-2" />
                    </div>

                    <!-- Subheading Input -->
                    <div>
                        <x-input-label for="sub_heading" :value="__('Sub Heading')" />
                        <x-text-input id="sub_heading" class="block w-full mt-1" type="text" name="sub_heading"
                            value="{{ old('sub_heading', $heroSection->sub_heading) }}" required autofocus autocomplete="sub_heading" />
                        <x-input-error :messages="$errors->get('sub_heading')" class="mt-2" />
                    </div>

                    <!-- Achievement Field with CKEditor -->
                    <div class="mt-4">
                        <x-input-label for="achievement" :value="__('Achievement')" />
                        <textarea id="achievement" name="achievement" rows="4" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" placeholder="Describe achievements">{{ old('achievement', $heroSection->achievement) }}</textarea>
                        <x-input-error :messages="$errors->get('achievement')" class="mt-2" />
                    </div>

                    <!-- Banner Input with Preview -->
                    <div class="mt-4">
                        <x-input-label for="banner" :value="__('Banner')" />
                        <img id="banner-preview" src="{{ $heroSection->banner ? Storage::url($heroSection->banner) : '' }}" alt="Current Banner" class="rounded-2xl object-cover w-[90px] h-[90px] mb-4">
                        <x-text-input id="banner" class="block w-full mt-1" type="file" name="banner" autofocus
                            autocomplete="banner" accept="image/*" />
                        <x-input-error :messages="$errors->get('banner')" class="mt-2" />
                        <p class="text-sm text-gray-500">Leave blank if you don't want to change the banner.</p>
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="flex items-center justify-end mt-4 gap-4">
                        <a href="{{ route('admin.hero_sections.index') }}" 
                            class="px-6 py-4 font-bold text-white bg-gray-500 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Batal
                        </a>

                        <button type="submit" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Update Hero Section
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SweetAlert and JavaScript for Banner Preview -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <script>
        // SweetAlert confirmation on submit
        document.getElementById('hero-section-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan bisa mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, perbarui!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit(); // Submit the form if confirmed
                }
            });
        });

        // JavaScript to preview the selected banner image
        document.getElementById('banner').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('banner-preview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Initialize CKEditor for the achievement field
        ClassicEditor
            .create(document.querySelector('#achievement'))
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>
