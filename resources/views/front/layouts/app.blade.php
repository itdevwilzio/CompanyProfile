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

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- CSS for floating WhatsApp buttons -->
    <style>
       /* WhatsApp button common styles */
       .whatsapp-float {
        position: fixed;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        background-color: #25D366;
        color: white;
        border-radius: 50%;
        text-align: center;
        font-size: 25px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s, transform 0.3s;
        right: 20px;
        bottom: 20px;
    }

    .whatsapp-float i {
        font-size: 32px;
    }

    /* Hover effect for the button */
    .whatsapp-float:hover {
        background-color: #128C7E;
    }

    /* Modal styles (if used) */
    .modal {
        display: none;
        position: fixed;
        z-index: 10000;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        max-width: 300px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .modal .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background: transparent;
        border: none;
        font-size: 20px;
        cursor: pointer;
    }

    /* WhatsApp modal buttons */
    .whatsapp-modal-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #25D366;
        color: white;
        padding: 10px;
        margin: 10px 0;
        border-radius: 30px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .whatsapp-modal-btn i {
        margin-right: 10px;
        font-size: 24px;
    }

    .whatsapp-modal-btn:hover {
        background-color: #128C7E;
    }

    /* Responsive styling for smaller screens */
    @media (max-width: 640px) {
        .whatsapp-float {
            width: 50px;
            height: 50px;
            font-size: 20px;
            right: 10px;
            bottom: 10px;
        }

        .whatsapp-float i {
            font-size: 20px;
        }
    }
            position: fixed;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background-color: #25D366;
            color: white;
            border-radius: 50%;
            text-align: center;
            font-size: 25px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s, transform 0.3s;
            right: 20px;
            bottom: 20px;
        }

        .whatsapp-float i {
            font-size: 32px;
        }

        .whatsapp-float:hover {
            background-color: #128C7E;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 10000;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            max-width: 300px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .modal .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: transparent;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        /* Button inside modal */
        .whatsapp-modal-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #25D366;
            color: white;
            padding: 10px;
            margin: 10px 0;
            border-radius: 30px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .whatsapp-modal-btn i {
            margin-right: 10px;
            font-size: 24px;
        }

        .whatsapp-modal-btn:hover {
            background-color: #128C7E;
        }

        /* Close modal button */
        .close-modal {
            background-color: transparent;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        /* Responsive enhancements for smaller screens */
        @media (max-width: 640px) {
            .whatsapp-float {
            width: 50px;
            height: 50px;
            font-size: 20px;
            right: 15px;
            bottom: 15px;
        }

            .whatsapp-float i {
                font-size: 20px;
            }
        }

        @media (max-width: 320px) {
        .whatsapp-float {
            width: 45px;
            height: 45px;
            font-size: 18px;
            right: 10px;
            bottom: 10px;
        }

        .whatsapp-float i {
            font-size: 18px;
        }
    }
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
    {{-- Scripts go here --}}
    @stack('after-scripts')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <!-- WhatsApp floating button to open modal -->
    <div class="whatsapp-float" id="open-whatsapp-modal">
        <i class="fab fa-whatsapp"></i>
    </div>

    <!-- Modal Structure -->
    <div id="whatsapp-modal" class="modal">
        <div class="modal-content">
            <button class="close-btn" id="close-modal">&times;</button>
            <h2 class="mb-4">Chat dengan Tim Wilzio</h2>
            <a href="https://wa.me/6285179709387" class="whatsapp-modal-btn" target="_blank">
                <i class="fab fa-whatsapp"></i>Marketing Wilzio
            </a>
            <a href="https://wa.me/6285179738286" class="whatsapp-modal-btn" target="_blank">
                <i class="fab fa-whatsapp"></i>NOC Wilzio
            </a>
        </div>
    </div>

    <!-- Font Awesome for WhatsApp icon -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" defer></script>

    <script>
        // toggle navbar mobile
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

         // Modal functionality
        const modal = document.getElementById('whatsapp-modal');
        const openModalBtn = document.getElementById('open-whatsapp-modal');
        const closeModalBtn = document.getElementById('close-modal');

        // Open modal when WhatsApp floating button is clicked
        openModalBtn.addEventListener('click', function() {
            modal.style.display = 'flex';
        });

        // Close modal when close button is clicked
        closeModalBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        // Close modal when clicked outside the modal content
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    </script>
</body>

</html>
