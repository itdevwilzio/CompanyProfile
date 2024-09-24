<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 | Forbidden</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            background-color: #1f2937;
            color: #f3f4f6;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            text-align: center;
        }

        .error-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: fadeIn 1.2s ease-in-out;
        }

        h1 {
            font-size: 6rem;
            color: #ef4444;
            margin-bottom: 0.5rem;
            animation: bounce 1.5s infinite;
        }

        p {
            font-size: 1.75rem;
            margin-bottom: 2rem;
        }

        .home-link {
            padding: 0.75rem 1.5rem;
            background-color: #3b82f6;
            color: white;
            border-radius: 1rem;
            text-decoration: none;
            font-size: 1.25rem;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .home-link:hover {
            background-color: #2563eb;
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 4rem;
            }

            p {
                font-size: 1.5rem;
            }

            .home-link {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>403</h1>
        <p>Halaman ini tidak bisa diakses.<br>Silahkan kembali ke dashboard.</p>
        <a href="{{ url('/dashboard') }}" class="home-link">Kembali ke Dashboard</a>
    </div>
</body>
</html>
