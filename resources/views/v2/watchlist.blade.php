<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watchlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>
    @include('components.layouts.navbar')

    <div class="container">
        <h1 class="text-center mb-4 mt-4 "><strong>Watchlist</strong></h1>
        <div class="row mb-4">
            <div class="col-md-8 offset-md-2">
                <div class="input-group">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search in watchlist..."
                        oninput="filterWatchlist()" style="margin-right: 10px;">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="goBack()">Back</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="watchlistContainer">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Symbol</th>
                        <th>Current Price (IDR)</th>
                        <th>Price 24h</th>
                        <th>Change (%)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="watchlistBody">
                    <!-- Watchlist items will be appended here -->
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        let watchlist = JSON.parse(sessionStorage.getItem('watchlist')) || [];
        let allWatchlistCoins = [];

        async function fetchWatchlistCoins() {
            const response = await fetch(`https://indodax.com/api/summaries`);
            const data = await response.json();
            const prices24h = data.prices_24h;
            allWatchlistCoins = watchlist.map(coinSymbol => {
                const coinInfo = data.tickers[coinSymbol];
                return {
                    symbol: coinSymbol,
                    currentPrice: parseFloat(coinInfo.last),
                    price24hAgo: parseFloat(prices24h[coinSymbol.replace('_', '')])
                };
            });
            displayWatchlist(allWatchlistCoins);
        }

        function displayWatchlist(coins) {
            const watchlistBody = document.getElementById('watchlistBody');
            watchlistBody.innerHTML = '';
            if (coins.length === 0) {
                watchlistBody.innerHTML = '<tr><td colspan="5" class="text-center">No coins in your watchlist</td></tr>';
            } else {
                coins.forEach(coin => {
                    const change = calculateChange(coin.currentPrice, coin.price24hAgo);
                    const changeClass = change < 0 ? 'text-danger' : 'text-success';
                    const row = document.createElement('tr');
                    row.innerHTML = `<td>${coin.symbol.toUpperCase()}</td>
                                     <td>IDR ${coin.currentPrice.toLocaleString()}</td>
                                     <td>IDR ${coin.price24hAgo.toLocaleString()}</td>
                                     <td class="${changeClass}">${change}%</td>
                                     <td><button class="btn btn-danger btn-sm" onclick="removeFromWatchlist('${coin.symbol}')">Remove</button></td>`;
                    watchlistBody.appendChild(row);
                });
            }
        }

        function filterWatchlist() {
            const query = document.getElementById('searchInput').value.trim().toLowerCase();
            const filteredCoins = allWatchlistCoins.filter(coin =>
                coin.symbol.toLowerCase().includes(query)
            );
            displayWatchlist(filteredCoins);
        }

        function calculateChange(currentPrice, price24hAgo) {
            if (!currentPrice || !price24hAgo) {
                return 'NaN';
            }
            return ((currentPrice - price24hAgo) / price24hAgo * 100).toFixed(2);
        }

        function removeFromWatchlist(coinSymbol) {
            watchlist = watchlist.filter(symbol => symbol !== coinSymbol);
            sessionStorage.setItem('watchlist', JSON.stringify(watchlist));
            fetchWatchlistCoins();
        }

        function goBack() {
            window.location.href = '/v2/market';
        }

        // Initial load
        fetchWatchlistCoins();
    </script>
</body>

</html>