<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('New Location') }}
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

                <form method="POST" action="{{ route('admin.locations.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="my-4">
                        <x-input-label for="image" :value="__('Image')" />
                        <x-text-input id="image" class="block w-full mt-1" type="file" name="image" required
                            autofocus autocomplete="image" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                    <div>
                        <img id="upload-preview" src="" class="mx-auto" alt="Preview" style="display: none; max-width: 100%; height: auto;">
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Add New Location
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('upload-preview');
            
            if (file) {
                const reader = new FileReader();
    
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
    
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>
