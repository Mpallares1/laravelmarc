<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-[#080810] text-[#e6e6fa] font-sans min-h-screen flex flex-col">
<header class="bg-[#0a0a14] backdrop-blur-md bg-opacity-70 shadow-md py-4 px-6 flex justify-between items-center border-b border-gray-700">
    <div class="text-2xl font-bold tracking-widest text-[#ffff00] neon-text">
        Marc Video
    </div>
    <button id="menu-toggle" class="sm:hidden text-[#e6e6fa] text-2xl focus:outline-none">
        ☰
    </button>
    <nav id="navbar" class="hidden sm:flex flex-col sm:flex-row sm:space-x-6 absolute sm:static top-16 left-0 w-full sm:w-auto bg-[#0a0a14] sm:bg-transparent z-10 transition-all duration-300 ease-in-out">
        <ul class="flex flex-col sm:flex-row sm:space-x-6 bg-[#1a1a2e] sm:bg-transparent p-4 sm:p-0 rounded-lg shadow-lg sm:shadow-none">
            <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
            <li><a href="{{ route('videos.index') }}" class="nav-link">Videos</a></li>
            <li><a href="{{ route('users.index') }}" class="nav-link">Usuaris</a></li>
            <li><a href="{{ route('series.index') }}" class="nav-link">Series</a></li>
            @auth
                <li><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>
                @can('manage-videos')
                    <li><a href="{{ route('videos.manage.index') }}" class="nav-link">Administrar Videos</a></li>
                @endcan
                @can('admmistradorUsuaris')
                    <li><a href="{{ route('users.manage.index') }}" class="nav-link">Administrar Usuaris</a></li>
                @endcan
                @can('manageseries')
                    <li><a href="{{ route('series.manage.index') }}" class="nav-link">Administrar Series</a></li>
                @endcan
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="nav-link bg-red-600 hover:bg-red-700 px-4 py-2 rounded-md">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="nav-link special">Login</a></li>
                <li><a href="{{ route('register') }}" class="nav-link special">Register</a></li>
            @endauth
        </ul>
    </nav>
</header>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const navbar = document.getElementById('navbar');

    menuToggle.addEventListener('click', () => {
        navbar.classList.toggle('hidden');
    });
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');

    body {
        font-family: 'Orbitron', sans-serif;
        overflow-x: hidden;
    }

    .neon-text {
        text-shadow: 0 0 10px #ffff00, 0 0 20px #ffff00, 0 0 30px #ffff00;
    }

    .nav-link {
        color: #e6e6fa;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease-in-out;
        padding: 8px 12px;
        border-radius: 6px;
    }

    .nav-link:hover {
        color: #ffff00;
        text-shadow: 0 0 5px #ffff00, 0 0 10px #ffff00;
    }

    #navbar {
        background-color: rgba(26, 26, 46, 0.95); /* Dark background for readability */
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    }

    #navbar ul {
        padding: 1rem;
    }

    #navbar li {
        margin: 0.5rem 0;
    }

    @media (min-width: 640px) {
        #navbar {
            background-color: transparent;
            box-shadow: none;
        }

        #navbar ul {
            padding: 0;
        }

        #navbar li {
            margin: 0;
        }
    }
</style>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');

    body {
        font-family: 'Orbitron', sans-serif;
        overflow-x: hidden;
    }

    .neon-text {
        text-shadow: 0 0 10px #ffff00, 0 0 20px #ffff00, 0 0 30px #ffff00;
    }

    .nav-link {
        color: #e6e6fa;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease-in-out;
        padding: 8px 12px;
        border-radius: 6px;
        border: 2px solid transparent; /* Añadido para borde */
    }

    .nav-link:hover {
        color: #ffff00;
        text-shadow: 0 0 5px #ffff00, 0 0 10px #ffff00;
        border-color: #ffff00; /* Borde resaltado */
        background-color: rgba(255, 255, 0, 0.1); /* Fondo sutil */
    }

    .nav-link.bg-[#e63946] {
        background-color: #e63946;
        color: #fff;
        font-weight: bold;
        border: 2px solid #d62839; /* Borde para Logout */
    }

    .nav-link.special {
        background-color: #e63946; /* Rojo llamativo */
        color: #ffffff;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 8px;
        border: 2px solid #d62839; /* Borde rojo */
        box-shadow: 0 4px 10px rgba(230, 57, 70, 0.5); /* Sombra */
        transition: all 0.3s ease-in-out;
    }

    .nav-link.special:hover {
        background-color: #d62839; /* Rojo más oscuro */
        border-color: #ff0000; /* Borde más brillante */
        color: #ffff00; /* Texto amarillo */
        text-shadow: 0 0 5px #ff0000, 0 0 10px #ff0000; /* Efecto de brillo */
        transform: scale(1.1); /* Aumenta ligeramente el tamaño */
    }

    .nav-link.bg-[#e63946]:hover {
                              background-color: #d62839;
                              border-color: #ff0000; /* Borde más brillante */
                              text-shadow: 0 0 5px #ff0000, 0 0 10px #ff0000;
                          }
</style>

<main class="container mx-auto flex-grow p-6">
    @yield('content')
</main>

<x-footer />

</body>
</html>
