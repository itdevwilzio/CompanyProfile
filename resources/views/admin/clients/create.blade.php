<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('New Client') }}
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

                <form method="POST" action="{{ route('admin.clients.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Name Input -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Occupation Input -->
                    <div class="mt-4">
                        <x-input-label for="occupation" :value="__('Occupation')" />
                        <x-text-input id="occupation" class="block w-full mt-1" type="text" name="occupation"
                            :value="old('occupation')" required autofocus autocomplete="occupation" />
                        <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
                    </div>

                    <!-- Avatar Input with Preview -->
                    <div class="mt-4">
                        <x-input-label for="avatar" :value="__('Avatar')" />
                        <x-text-input id="avatar" class="block w-full mt-1" type="file" name="avatar" required
                            onchange="previewImage(event, 'avatar-preview')" />
                        <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                        
                        <!-- Avatar Preview -->
                        <img id="avatar-preview" class="mt-4 rounded-md object-cover w-[200px] h-[200px]" style="display: none;">
                    </div>

                    <!-- Logo Input with Preview -->
                    <div class="mt-4">
                        <x-input-label for="logo" :value="__('Logo')" />
                        <x-text-input id="logo" class="block w-full mt-1" type="file" name="logo" required
                            onchange="previewImage(event, 'logo-preview')" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                        
                        <!-- Logo Preview -->
                        <img id="logo-preview" class="mt-4 rounded-md object-cover w-[200px] h-[200px]" style="display: none;">
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Add New Client
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- JavaScript to preview images -->
    <script>
        function previewImage(event, previewId) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById(previewId);
                preview.src = reader.result;
                preview.style.display = 'block'; // Show the image preview
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>
