<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<nav>
    <ul>
        <li><a href="{{ route('videos.index') }}">Home</a></li>
        <li><a href="{{ route('videos.create') }}">Add Video</a></li>
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        @auth
            <li><a href="{{ route('logout') }}">Logout</a></li>
        @else
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @endauth
    </ul>
</nav>

<div class="content">
    @yield('content')
</div>

<footer>
    <p>&copy; {{ date('Y') }} Videos App. All rights reserved.</p>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
