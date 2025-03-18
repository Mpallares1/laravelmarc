<footer>
    <div>&copy; {{ date('Y') }} Videos App</div>
    <div class="social-icons">
        <a href="https://facebook.com" title="Facebook">FB</a>
        <a href="https://twitter.com" title="Twitter">TW</a>
        <a href="https://instagram.com" title="Instagram">IG</a>
        <a href="https://youtube.com" title="YouTube">YT</a>
    </div>
    <p>Fet per <a href="https://github.com/Mpallares1" target="_blank">Marc Pallares</a></p>
</footer>

<style>
    footer {
        padding: 1rem;
        background-color: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(5px);
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #fff;
    }

    .social-icons a {
        color: #fff;
        text-decoration: none;
        margin: 0 10px;
        transition: color 0.3s ease;
    }

    .social-icons a:hover {
        color: #ffff00;
    }

    footer a {
        color: #ffff00;
        text-decoration: none;
    }

    footer a:hover {
        text-decoration: underline;
    }
</style>
