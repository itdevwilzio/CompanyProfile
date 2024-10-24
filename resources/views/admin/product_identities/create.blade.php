<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('New Product Identity') }}
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

                <form id="product-form" method="POST" action="{{ route('admin.product_identities.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Name Input -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Description Input -->
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" class="ckeditor block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="description" rows="4">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Details Input -->
                    <div class="mt-4">
                        <x-input-label for="details" :value="__('Details')" />
                        <textarea id="details" class="ckeditor block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="details" rows="4">{{ old('details') }}</textarea>
                        <x-input-error :messages="$errors->get('details')" class="mt-2" />
                    </div>

                    <!-- Vision Input -->
                    <div class="mt-4">
                        <x-input-label for="vision" :value="__('Vision')" />
                        <textarea id="vision" class="ckeditor block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="vision" rows="4">{{ old('vision') }}</textarea>
                        <x-input-error :messages="$errors->get('vision')" class="mt-2" />
                    </div>

                    <!-- Mission Input -->
                    <div class="mt-4">
                        <x-input-label for="mission" :value="__('Mission')" />
                        <textarea id="mission" class="ckeditor block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="mission" rows="4">{{ old('mission') }}</textarea>
                        <x-input-error :messages="$errors->get('mission')" class="mt-2" />
                    </div>

                    <!-- Content Level 1 Input -->
                    <div class="mt-4">
                        <x-input-label for="contentl1" :value="__('Content Level 1')" />
                        <textarea id="contentl1" class="ckeditor block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="contentl1" rows="4">{{ old('contentl1') }}</textarea>
                        <x-input-error :messages="$errors->get('contentl1')" class="mt-2" />
                    </div>

                    <!-- Content Level 2 Input -->
                    <div class="mt-4">
                        <x-input-label for="contentl2" :value="__('Content Level 2')" />
                        <textarea id="contentl2" class="ckeditor block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="contentl2" rows="4">{{ old('contentl2') }}</textarea>
                        <x-input-error :messages="$errors->get('contentl2')" class="mt-2" />
                    </div>

                    <!-- Content Level 3 Input -->
                    <div class="mt-4">
                        <x-input-label for="contentl3" :value="__('Content Level 3')" />
                        <textarea id="contentl3" class="ckeditor block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                                  name="contentl3" rows="4">{{ old('contentl3') }}</textarea>
                        <x-input-error :messages="$errors->get('contentl3')" class="mt-2" />
                    </div>

                    <!-- Logo Input with Preview -->
                    <div class="mt-4">
                        <x-input-label for="logo" :value="__('Logo')" />
                        <x-text-input id="logo" class="block w-full mt-1" type="file" name="logo" required
                                      onchange="previewLogo(event)" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                        
                        <!-- Image Preview -->
                        <img id="logo-preview" class="mt-4 rounded-md object-cover w-[200px] h-[200px]" style="display: none;">
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                            Add New Product Identity
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- CKEditor Script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script>
        // CKEditor Initialization
        document.querySelectorAll('.ckeditor').forEach((editorElement) => {
            ClassicEditor.create(editorElement).then(editor => {
                editorElement.ckeditorInstance = editor;  // Store the editor instance
            }).catch(error => {
                console.error(error);
            });
        });

        // Form Submission Handler
        document.getElementById('submit-button').addEventListener('click', function (event) {
            event.preventDefault(); // Prevent form submission
            
            let isFormValid = true;

            // Validate CKEditor fields
            document.querySelectorAll('.ckeditor').forEach(editorElement => {
                const editorData = editorElement.ckeditorInstance.getData().trim();
                if (!editorData) {
                    isFormValid = false;
                    alert('Please fill out all required fields.');
                    editorElement.focus();
                    return false;
                }
            });

            // Submit the form if valid
            if (isFormValid) {
                document.getElementById('product-form').submit();
            }
        });

        // Image Preview Script
        function previewLogo(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('logo-preview');
                preview.src = reader.result;
                preview.style.display = 'block'; // Show the preview image
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</x-app-layout>
