<!-- resources/views/layouts/videos-app-layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marc Video </title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #000;
            color: #fff;
            font-family: 'Orbitron', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
        }

        header, footer {
            padding: 1rem;
            background-color: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(5px);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header nav a, footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            transition: color 0.3s ease;
        }

        header nav a:hover, footer a:hover {
            color: #ffff00;
        }

        main {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .video-container {
            position: relative;
            width: 80vw;
            max-width: 1000px;
            aspect-ratio: 16 / 9;
        }



        .video-container::before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            border: 2px solid transparent;
            border-radius: 10px;
            background: linear-gradient(45deg, #ff00e0, #00ff00, #ffff00, #ff00e0);
            background-size: 400% 400%;
            animation: neon 25s ease infinite;
            filter: blur(5px);
            z-index: -1;
        }

        .video-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
            border-radius: 8px;
        }

        video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @keyframes neon {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #ffff00;
            text-shadow: 0 0 10px #ffff00, 0 0 20px #ffff00, 0 0 30px #ffff00;
        }

        .social-icons a {
            font-size: 1.2rem;
            margin: 0 10px;
        }
    </style>
</head>
<body>
<header>
    <div class="logo">Marc Video</div>
    <nav>
        <a href="http://localhost:8000/">Home</a>
        <a href="#">Gallery</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <div>&copy; 2025 Marc Video </div>
    <div class="social-icons">
        <a href="" title="Facebook">FB</a>
        <a href="#" title="Twitter">TW</a>
        <a href="#" title="Instagram">IG</a>
        <a href="#" title="YouTube">YT</a>
    </div>
</footer>
</body>
</html>
