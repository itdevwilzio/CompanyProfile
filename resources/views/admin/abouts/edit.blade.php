<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit About') }}
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

                <form id="update-about-form" method="POST" action="{{ route('admin.abouts.update', $about) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            value="{{ $about->name }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                
                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        <img src="{{ Storage::url($about->thumbnail) }}" alt=""
                            class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="thumbnail" class="block w-full mt-1" type="file" name="thumbnail" autofocus />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <h3 class="mt-4 text-lg font-bold text-indigo-950">Description</h3>
                
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" class="block w-full mt-1" type="text" name="description" rows="30"
                                    required autofocus>{{ old('description', $about->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                
                    <div class="flex items-center justify-end mt-4">
                        <button id="submit-button" type="button" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                            Update About
                        </button>
                    </div>
                </form>

                <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    /* CKEditor */
                    ClassicEditor.create(document.querySelector("#description"));

                    document.getElementById('submit-button').addEventListener('click', function(event) {
                        event.preventDefault(); // Prevent the default button action

                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "Anda ingin memperbarui About ini?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, perbarui!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('update-about-form').submit();  // Submit the form if confirmed
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
