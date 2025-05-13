<header>
    <div class="logo">Marc Video</div>
    <button class="navbar-toggler" onclick="toggleNavbar()">☰</button>
    <nav class="navbar">
        <ul id="navbar-menu">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('videos.index') }}">Videos</a></li>
            <li><a href="{{ route('users.index') }}">Usuaris</a></li>
            @auth
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @can('manage-videos')
                    <li><a href="{{ route('videos.manage.index') }}">Administrar Videos</a></li>
                @endcan
                @can('admmistradorUsuaris')
                    <li><a href="{{ route('users.manage.index') }}">Administrar Usuaris</a></li>
                @endcan
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @endauth
        </ul>
    </nav>
</header>

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

    header {
        padding: 1rem;
        background-color: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(5px);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        font-size: 1.5rem;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #ffff00;
        text-shadow: 0 0 10px #ffff00, 0 0 20px #ffff00, 0 0 30px #ffff00;
    }

    .navbar {
        display: flex;
    }

    .navbar ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        gap: 15px;
    }

    .navbar ul li {
        margin: 0;
    }

    nav a {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    nav a:hover {
        color: #ffff00;
    }

    .navbar-toggler {
        display: none;
        background: none;
        border: none;
        color: #fff;
        font-size: 1.5rem;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .navbar {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            display: none;
            flex-direction: column;
            align-items: center;
        }

        .navbar ul {
            flex-direction: column;
            gap: 10px;
        }

        .navbar-toggler {
            display: block;
        }

        .navbar.show {
            display: flex;
        }
    }
</style>

<script>
    function toggleNavbar() {
        const navbar = document.querySelector('.navbar');
        navbar.classList.toggle('show');
    }
</script>
