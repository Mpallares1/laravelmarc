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
    <nav>
        <ul class="flex space-x-6">
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
                        <button type="submit" class="nav-link bg-[#e63946] hover:bg-[#d62839] px-4 py-2 rounded-md">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
            @endauth
        </ul>
    </nav>
</header>

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
</style>

<main class="container mx-auto flex-grow p-6">
    @yield('content')
</main>

<x-footer />

</body>
</html>
