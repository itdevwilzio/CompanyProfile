<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS for carousel/flickity -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity-fade@2/flickity-fade.css">

    {{-- Tailwind CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Feather icon --}}
    <link rel="stylesheet" href="{{ asset('assets/feather/feather.css') }}">

    <!-- CSS for floating WhatsApp button -->
    <style>
        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }

        .whatsapp-float a {
            display: inline-block;
            background-color: #25D366;
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            text-align: center;
            line-height: 60px;
            font-size: 24px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s;
        }

        .whatsapp-float a:hover {
            background-color: #128C7E;
        }

        /* Wave SVG Background */
        /* .wave-container {
            position: relative;
            margin-bottom: 100px; /* Add some space for the WhatsApp button */
        }

        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: auto;
        } */
    </style>

</head>

<body class="font-poppins text-cp-black bg-primary">

    @yield('content')

    {{-- <!-- Wave SVG at the Bottom -->
    <div class="wave-container">
        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#312ECB" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div> --}}

    @stack('before-scripts')
    {{-- file js disini.... khusus semua halaman --}}

    @stack('after-scripts')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <!-- Floating WhatsApp Button -->
    <div class="whatsapp-float">
        <a href="https://wa.me/6282211376074" target="_blank" title="Chat with our Customer Service on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <!-- Font Awesome for WhatsApp icon -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" defer></script>

    <script>
        $(document).ready(function() {
            $('#toggle-navbar-mobile').on('click', function() {
                $('#navbar').toggleClass('opened');
                $('#navbar-overlay').toggleClass('hidden')
            });

            $('#close-navbar-mobile').on('click', function() {
                $('#navbar').removeClass('opened');
                $('#navbar-overlay').addClass('hidden')
            });
        })
    </script>
</body>

</html>
