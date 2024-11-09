<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Dynamic Meta Tags -->
        <meta name="description" content="@yield('meta_description', 'Welcome to Wilzio.com - Best Internet Provider')">
        <meta name="keywords" content="@yield('meta_keywords', 'Wilzio, Internet Provider, Best Connection, Fast Internet')">
        <meta name="author" content="@yield('meta_author', 'Wilzio Internet Provider')">

        <!-- Dynamic Title -->
        <title>@yield('meta_title', config('app.name', 'Wilzio.com'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Nunito:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Feather icon -->
        <link rel="stylesheet" href="{{ asset('assets/feather/feather.css') }}">

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

        <!-- SweetAlert2 CDN -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="font-sans antialiased flex flex-col min-h-screen">
        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Main Content -->
        <main class="flex-grow">
            @yield('content')
            {{ $slot ?? '' }}
        </main>

        <!-- Footer -->
        @section('footer')
        <footer class="w-full bg-[#0E3995] text-white">
            <div class="container max-w-7xl mx-auto px-4 py-10">
                <div class="flex flex-col items-center justify-center">
                    <!-- Follow Us Section -->
                    <p class="font-nunito font-bold text-lg mb-4">
                        Ikuti Kami
                    </p>
                    <div class="flex items-center gap-6 mb-6">
                        <a href="#" target="_blank" class="hover:opacity-80 transition-opacity duration-300">
                            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center">
                                <i class="feather icon-facebook text-[#0E3995]"></i>
                            </div>
                        </a>
                        <!-- Add other social media links as needed -->
                    </div>
                    <!-- Copyright Section -->
                    <p class="text-sm text-center">
                        &copy; {{ date('Y') }} wilzio.com. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
        @show
    </body>
</html>