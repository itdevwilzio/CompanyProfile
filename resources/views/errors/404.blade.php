<!-- resources/views/errors/404.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Nunito', sans-serif;
        }

        .error-container {
            text-align: center;
            padding: 50px;
        }

        .error-code {
            font-size: 10rem;
            font-weight: 900;
            color: #4f46e5;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 0; /* Align logo and code closer together */
        }

        .astronaut {
            display: inline-block;
            margin-top: -20px;
            width: 150px;
            height: auto;
            animation: floating 4s infinite ease-in-out;
        }

        .error-message {
            font-size: 2rem;
            font-weight: 700;
            color: #374151;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .error-description {
            font-size: 1.25rem;
            color: #6b7280;
            margin-bottom: 40px;
        }

        .btn-home {
            display: inline-block;
            padding: 15px 30px;
            background-color: #4f46e5;
            color: white;
            font-size: 1.2rem;
            font-weight: 700;
            border-radius: 50px;
            text-transform: uppercase;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-home:hover {
            background-color: #4338ca;
            transform: translateY(-5px);
        }

        @keyframes floating {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="error-container">
        <h1 class="error-code">404</h1>
        <img src="{{ asset('assets/logo/logo.png') }}" alt="Logo" class="astronaut" />
        <p class="error-message">Halaman Tidak Ditemukan</p>
        <p class="error-description">Sepertinya kami tidak dapat menemukan halaman yang Anda cari.</p>
        <a href="{{ url('/') }}" class="btn-home">Kembali ke Beranda</a>
    </div>

</body>
</html>
