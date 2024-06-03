<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top">
    <div class="container">
        <p class="text-center fw-bold">KELOMPOK 3</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
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
                <li class="nav-item">
                    <a class="nav-link" href="/v2/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/v2/register">Register</a>
                </li>
                <li class="nav-item">
                    <form class="d-inline" method="post" action="/v2/logout">
                        @csrf
                        <button class="link-btn btn" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
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