<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top">
    <div class="container">
        <!-- Bagian judul kelompok di sisi kiri -->
        <div class="navbar-header">
            <p class="mb-0 fw-bold">KELOMPOK 3</p>
        </div>

        <!-- Toggler untuk responsive menu -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Bagian menu navigasi utama -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/v2/market">Market</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/v2/watchlist">Watchlist</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/v2/my-portofolio">Portofolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/v2/tradingview">Tradingview</a>
                </li>
            </ul>
        </div>

        <!-- Bagian autentikasi di sisi kanan -->
        <ul class="navbar-nav">
            @auth
            <li class="nav-item">
                <form class="d-inline" method="post" action="/v2/logout">
                    @csrf
                    <button class="btn btn-secondary" type="submit">Logout</button>
                </form>
            </li>
            @else
            <li class="nav-item">
                <a class="btn btn-secondary" href="/v2/login">Login</a>
            </li>
            @endauth
        </ul>
    </div>
</nav>

<style>
    .navbar {
        background-color: #f8f9fa;
    }

    .nav-link {
        transition: color 0.2s;
    }

    .nav-link:hover {
        color: #007bff !important;
    }

    .navbar-nav .nav-item {
        margin-left: 15px;
    }

    .sticky-top {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 1020;
    }
</style>
