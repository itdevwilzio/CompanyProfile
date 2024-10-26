<!-- resources/views/errors/404.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Nunito', sans-serif;
        }

        .error-container {
            position: relative;
            text-align: center;
            padding: 50px;
        }

        .error-code {
            font-size: 10rem;
            font-weight: 900;
            color: #4f46e5;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .error-message {
            font-size: 2rem;
            font-weight: 700;
            color: #374151;
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

        .astronaut {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: floating 4s infinite ease-in-out;
        }

        @keyframes floating {
            0% { transform: translate(-50%, -50%) translateY(0); }
            50% { transform: translate(-50%, -50%) translateY(-20px); }
            100% { transform: translate(-50%, -50%) translateY(0); }
        }

    </style>
</head>
<body>

    <div class="error-container">
        <h1 class="error-code">404</h1>
        <p class="error-message">Page Not Found</p>
        <p class="error-description">It seems we can't find the page you're looking for.</p>
        <a href="{{ url('/') }}" class="btn-home">Return Home</a>

        <img src="{{ asset('logo/logo_44.svg') }}" alt="Logo" class="astronaut" width="200" />
    </div>

</body>
</html>
