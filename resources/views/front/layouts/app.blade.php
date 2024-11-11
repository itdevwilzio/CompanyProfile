<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <!-- CSS for carousel/flickity -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity-fade@2/flickity-fade.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery.js/dist/css/lightgallery.min.css">



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
    } */

    /* Responsive styling for smaller screens */
    @media (max-width: 640px) {

        h1 {
        text-align: center;
    }
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
            color: green;
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

        /* Testimonial Modal styles */
        .modal {
            display: none; /* This will be overridden by flex when visible */
            align-items: center; /* To center vertically */
            justify-content: center; /* To center horizontally */
            position: fixed; /* So it's above everything else */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 50;
        }

        .modal-content {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            max-width: 500px;
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

<body class="font-poppins text-cp-black">
    <div class="w-full absolute z-[1] top-0">
        <div class="bg-white h-20"></div>
        <svg width="100%" height="80px" id="svg" preserveAspectRatio="none" viewBox="0 0 1440 390" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150">
            <path d="M 0,400 L 0,75 C 48.05771365149833,54.46055000616599 96.11542730299666,33.921100012331976 145,48 C 193.88457269700334,62.078899987668024 243.59600443951166,110.77614995683808 306,110 C 368.40399556048834,109.22385004316192 443.5005549389566,58.9743001603157 491,43 C 538.4994450610434,27.0256998396843 558.4017758046615,45.32664940189912 613,68 C 667.5982241953385,90.67335059810088 756.8923418423973,117.71910223208782 818,105 C 879.1076581576027,92.28089776791218 912.0288568257492,39.79694166974965 958,42 C 1003.9711431742508,44.20305833025035 1062.992230854606,101.09313108891357 1114,109 C 1165.007769145394,116.90686891108643 1208.0022197558267,75.83053397459614 1261,62 C 1313.9977802441733,48.16946602540387 1376.9988901220868,61.58473301270193 1440,75 L 1440,400 L 0,400 Z" stroke="none" stroke-width="0" fill="#ffffff" fill-opacity="0.4" class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 200)"></path>
            <path d="M 0,400 L 0,175 C 40.6115673942533,161.34534467875199 81.2231347885066,147.690689357504 137,146 C 192.7768652114934,144.309310642496 263.7190282402269,154.582587248736 326,159 C 388.2809717597731,163.417412751264 441.9007522505857,161.9789616475521 488,168 C 534.0992477494143,174.0210383524479 572.67796275743,187.50156616105562 621,182 C 669.32203724257,176.49843383894438 727.3873967196943,152.01477370822545 780,153 C 832.6126032803057,153.98522629177455 879.7724503637933,180.43933900604262 941,190 C 1002.2275496362067,199.56066099395738 1077.5228018251328,192.22787026760392 1136,181 C 1194.4771981748672,169.77212973239608 1236.1363423356763,154.64917992354174 1284,153 C 1331.8636576643237,151.35082007645826 1385.931828832162,163.17541003822913 1440,175 L 1440,400 L 0,400 Z" stroke="none" stroke-width="0" fill="#ffffff" fill-opacity="0.53" class="transition-all duration-300 ease-in-out delay-150 path-1" transform="rotate(-180 720 200)"></path>
            <path d="M 0,400 L 0,275 C 66.9115797262301,273.18394376618573 133.8231594524602,271.3678875323714 188,268 C 242.1768405475398,264.6321124676286 283.61894191638925,259.71239363669997 337,264 C 390.38105808361075,268.28760636330003 455.701072881983,281.7825379208287 508,292 C 560.298927118017,302.2174620791713 599.5767665556788,309.1574546799852 639,299 C 678.4232334443212,288.8425453200148 717.9918608953016,261.58764335923047 770,248 C 822.0081391046984,234.4123566407695 886.455789863115,234.49197188309282 942,238 C 997.544210136885,241.50802811690718 1044.1849796522383,248.4444691083981 1093,261 C 1141.8150203477617,273.5555308916019 1192.8042915279318,291.73015168331483 1251,295 C 1309.1957084720682,298.26984831668517 1374.597854236034,286.6349241583426 1440,275 L 1440,400 L 0,400 Z" stroke="none" stroke-width="0" fill="#ffffff" fill-opacity="1" class="transition-all duration-300 ease-in-out delay-150 path-2" transform="rotate(-180 720 200)"></path>
        </svg>
    </div>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <!-- WhatsApp floating button to open modal -->
    <div class="whatsapp-float bg-green-500 text-white fixed bottom-5 right-5 w-16 h-16 rounded-full flex justify-center items-center shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out transform cursor-pointer" id="open-whatsapp-modal">
        <i class="fab fa-whatsapp text-3xl"></i>
    </div>

    <!-- Modal Structure -->
    <div id="whatsapp-modal" class="modal fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="modal-content bg-white w-full max-w-sm mx-auto p-4 md:p-6 rounded-lg shadow-lg relative">
            <button class="close-btn absolute right-3 top-3 text-2xl font-bold text-gray-600 hover:text-gray-800" id="close-modal">&times;</button>
            <h2 class="mb-4 text-lg md:text-xl font-semibold text-center pt-2">Chat dengan Tim Wilzio</h2>
    
            <!-- Marketing Button -->
            <a href="https://wa.me/6285179709387" 
                class="whatsapp-modal-btn w-full flex items-center justify-center bg-green-500 text-white font-bold py-3 px-4 md:px-5 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out mb-4 text-sm md:text-base">
                <i class="fab fa-whatsapp mr-2 text-lg"></i>
                <span>Marketing Wilzio</span>
            </a>
    
            <!-- NOC Button -->
            <a href="https://wa.me/6285179738286" 
                class="whatsapp-modal-btn w-full flex items-center justify-center bg-green-500 text-white font-bold py-3 px-4 md:px-5 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out mb-4 text-sm md:text-base">
                <i class="fab fa-whatsapp mr-2 text-lg"></i>
                <span>NOC Wilzio
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
    @stack('after-scripts')
</body>

</html>