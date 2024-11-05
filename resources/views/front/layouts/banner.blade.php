<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Dynamic Meta Tags -->
    <title>@yield('meta_title', config('app.name', 'Wilzio.com'))</title>
    <meta name="description" content="@yield('meta_description', 'Wilzio.com - Best Internet Provider')">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

    <!-- CSS and Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/feather/feather.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Additional CSS -->
    <style>
        /* Centered banner section */
        .banner-section {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 5rem;
        }
        
        /* Floating WhatsApp button */
        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #25D366;
            color: white;
            border-radius: 50%;
            font-size: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: none; /* Remove shadow */
        }

        .whatsapp-float:hover {
            background-color: #128C7E;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
            z-index: 50;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            max-width: 500px;
            text-align: center;
            box-shadow: none; /* Remove shadow */
        }

        .modal .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .whatsapp-float {
                width: 50px;
                height: 50px;
                font-size: 20px;
                bottom: 10px;
                right: 10px;
            }
        }
    </style>
</head>

<body class="font-poppins text-gray-900 bg-gray-100">
    <!-- Banner Layout -->
    <div class="banner-section">
        <div class="text-center max-w-4xl mx-auto">
            <img src="{{ Storage::url($heroSection->banner) }}" alt="Promotion Banner" class="object-cover w-full rounded-3xl">
            <h1 class="mt-8 text-5xl font-bold text-gray-800">{!! $heroSection->heading !!}</h1>
            <p class="mt-4 text-lg text-gray-700">{!! $heroSection->subheading !!}</p>
            <div class="mt-8 text-gray-600 text-justify">
                <p>{!! $heroSection->achievement !!}</p>
            </div>
        </div>
    </div>
    <!-- Floating WhatsApp Button -->
    <div class="whatsapp-float" id="open-whatsapp-modal">
        <i class="fab fa-whatsapp"></i>
    </div>

    <!-- WhatsApp Modal -->
    <div id="whatsapp-modal" class="modal">
        <div class="modal-content p-6 rounded-lg">
            <button class="close-btn" id="close-modal">&times;</button>
            <h2 class="text-xl font-semibold mb-4">Chat with Wilzio Team</h2>
            <a href="https://wa.me/6285179709387" target="_blank" class="whatsapp-modal-btn bg-green-500 text-white font-bold py-3 px-5 rounded-full">Marketing Wilzio</a>
            <a href="https://wa.me/6285179738286" target="_blank" class="whatsapp-modal-btn bg-green-500 text-white font-bold py-3 px-5 rounded-full mt-4">NOC Wilzio</a>
        </div>
    </div>

    <!-- Font Awesome for WhatsApp Icon -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" defer></script>

    <!-- Modal Script -->
    <script>
        const modal = document.getElementById('whatsapp-modal');
        const openModalBtn = document.getElementById('open-whatsapp-modal');
        const closeModalBtn = document.getElementById('close-modal');

        // Open modal when WhatsApp button is clicked
        openModalBtn.addEventListener('click', function() {
            modal.style.display = 'flex';
        });

        // Close modal when close button is clicked
        closeModalBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        // Close modal when clicking outside of modal content
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    </script>
</body>
</html>
