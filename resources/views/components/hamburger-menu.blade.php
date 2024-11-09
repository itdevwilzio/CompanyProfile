@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-400 text-start text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<!-- Hamburger Menu Button -->
<div class="relative">
    <button id="dropdownToggle" class="w-full ps-3 pe-4 py-2 block font-medium text-gray-600 bg-white focus:outline-none transition duration-150 ease-in-out">
        Menu
    </button>

    <!-- Dropdown Menu -->
    <div id="dropdownMenu" class="hidden absolute left-0 mt-2 w-full bg-white shadow-lg z-10">
        <a {{ $attributes->merge(['class' => $classes]) }}>
            {{ $slot }}
        </a>
        <a href="{{ route('front.product') }}" class="block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">
            Produk A
        </a>
        <a href="{{ route('front.location') }}" class="block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">
            Produk B
        </a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdownToggle = document.getElementById('dropdownToggle');
        const dropdownMenu = document.getElementById('dropdownMenu');

        // Toggle the dropdown visibility on button click
        dropdownToggle.addEventListener('click', function (event) {
            event.stopPropagation(); // Prevents click from closing immediately
            dropdownMenu.classList.toggle('hidden');
        });

        // Close the dropdown if clicked outside
        document.addEventListener('click', function (event) {
            if (!dropdownMenu.contains(event.target) && !dropdownToggle.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>
