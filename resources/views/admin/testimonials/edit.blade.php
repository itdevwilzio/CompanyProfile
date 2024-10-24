<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Testimonial') }}
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

                <form id="update-testimonial-form" method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mt-4">
                        <x-input-label for="project_client" :value="__('project_client')" />
                        <select name="project_client_id" id="project_client_id"
                            class="w-full py-3 pl-3 border rounded-lg border-slate-300">
                            <option value="{{ $testimonial->client->id }}">{{ $testimonial->client->name }}</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('project_client')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="message" :value="__('message')" />
                        <textarea name="message" id="message" cols="30" rows="5" class="w-full border border-slate-300 rounded-xl">{{ $testimonial->message }}</textarea>
                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('thumbnail')" />
                        <img src="{{ Storage::url($testimonial->thumbnail) }}" alt=""
                            class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="thumbnail" class="block w-full mt-1" type="file" name="thumbnail" autofocus
                            autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button id="submit-button" type="button" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                            Update Testimonial
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('submit-button').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default button action

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda ingin memperbarui Testimonial ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, perbarui!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('update-testimonial-form').submit();  // Submit the form if confirmed
                }
            });
        });
    </script>
</x-app-layout>
