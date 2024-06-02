<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market</title>
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
        <h1 class="text-center mb-4">Crypto Market</h1>
        <div class="row mb-4">
            <div class="col-md-8 offset-md-2">
                <div class="input-group">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search for a coin..."
                        oninput="filterCoins()">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="goToWatchlist()">Watchlist</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="searchResults" class="mb-4">
            <h2>All Coins</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Name</th>
                        <th>Symbol</th>
                        <th>Current Price (IDR)</th>
                        <th>Price 24h Ago (IDR)</th>
                        <th>Change (%)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="searchResultsBody">
                    <!-- Coin list will be appended here -->
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        let watchlist = JSON.parse(sessionStorage.getItem('watchlist')) || [];
        let allCoins = [];

        async function fetchCoins() {
            try {
                const response = await fetch(`https://indodax.com/api/summaries`);
                const data = await response.json();
                const tickers = data.tickers;
                const prices24h = data.prices_24h;
                allCoins = Object.entries(tickers).map(([symbol, info]) => ({
                    symbol,
                    name: info.name,
                    currentPrice: parseFloat(info.last),
                    price24hAgo: parseFloat(prices24h[symbol.replace('_', '')])
                }));
                displayCoins(allCoins);
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }

        function filterCoins() {
            const query = document.getElementById('searchInput').value.trim().toLowerCase();
            const filteredCoins = allCoins.filter(coin =>
                (coin.name && coin.name.toLowerCase().includes(query)) ||
                (coin.symbol && coin.symbol.toLowerCase().includes(query))
            );
            displayCoins(filteredCoins);
        }

        function displayCoins(coins) {
            const searchResultsBody = document.getElementById('searchResultsBody');
            searchResultsBody.innerHTML = '';
            if (coins.length === 0) {
                searchResultsBody.innerHTML = '<tr><td colspan="7" class="text-center">No coins found</td></tr>';
            } else {
                coins.forEach(coin => {
                    const change = calculateChange(coin.currentPrice, coin.price24hAgo);
                    const changeClass = change < 0 ? 'text-danger' : 'text-success';
                    const row = document.createElement('tr');
                    const coinId = coin.symbol.replace('_', '');
                    row.innerHTML = `<td><input type="checkbox" onchange="toggleWatchlist('${coin.symbol}')"></td>
                                     <td>${coin.name}</td>
                                     <td>${coin.symbol.toUpperCase()}</td>
                                     <td>IDR ${coin.currentPrice.toLocaleString()}</td>
                                     <td>IDR ${coin.price24hAgo.toLocaleString()}</td>
                                     <td class="${changeClass}">${change}%</td>
                                     <td><button class="btn btn-info btn-sm" onclick="goToCoinDetail('${coinId}', '${coin.name}')">Detail</button></td>`;
                    searchResultsBody.appendChild(row);
                });
            }
        }

        function toggleWatchlist(coinSymbol) {
            if (watchlist.includes(coinSymbol)) {
                watchlist = watchlist.filter(symbol => symbol !== coinSymbol);
            } else {
                watchlist.push(coinSymbol);
            }
            sessionStorage.setItem('watchlist', JSON.stringify(watchlist));
        }

        function calculateChange(currentPrice, price24hAgo) {
            if (!currentPrice || !price24hAgo) {
                return 'NaN';
            }
            return ((currentPrice - price24hAgo) / price24hAgo * 100).toFixed(2);
        }

        function goToCoinDetail(coinId, coinName) {
            window.location.href = `/v2/market-detail/${coinId}/${coinName}`;
        }

        function goToWatchlist() {
            window.location.href = '/v2/watchlist';
        }

        // Initial load
        fetchCoins();
    </script>
</body>

</html>
