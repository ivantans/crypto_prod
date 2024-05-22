<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypto Watchlist</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="text-center mb-4">Crypto Watchlist</h1>
        <div class="row mb-4">
            <div class="col-md-8 offset-md-2">
                <div class="input-group">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search for a coin..."
                        oninput="searchCoin()">
                </div>
            </div>
        </div>

        <div id="searchResults" class="mb-4">
            <h2>Search Results</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Symbol</th>
                        <th>Current Price (IDR)</th>
                        <th>Price 24h Ago (IDR)</th>
                        <th>Change (%)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="searchResultsBody">
                    <!-- Search results will be appended here -->
                </tbody>
            </table>
        </div>

        <div id="watchlistContainer">
            <h2 class="text-center">Watchlist</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Symbol</th>
                        <th>Current Price (IDR)</th>
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

    <script>
        let watchlist = JSON.parse(sessionStorage.getItem('watchlist')) || [];

        async function searchCoin() {
            const query = document.getElementById('searchInput').value.trim().toLowerCase();

            if (query) {
                try {
                    const response = await fetch(`https://indodax.com/api/summaries`);
                    const data = await response.json();
                    const tickers = data.tickers;
                    const prices24h = data.prices_24h;
                    const coins = Object.entries(tickers).map(([symbol, info]) => ({
                        symbol,
                        name: info.name,
                        currentPrice: parseFloat(info.last),
                        price24hAgo: parseFloat(prices24h[symbol.replace('_', '')]) // Ganti '_' dengan ''
                    }));
                    const filteredCoins = coins.filter(coin =>
                        (coin.name && coin.name.toLowerCase().includes(query)) ||
                        (coin.symbol && coin.symbol.toLowerCase().includes(query))
                    );
                    displaySearchResults(filteredCoins);
                } catch (error) {
                    console.error('Error fetching data:', error);
                }
            } else {
                displaySearchResults([]);
            }
        }   

        function calculateChange(currentPrice, price24hAgo) {
            if (!currentPrice || !price24hAgo) {
                console.log('Invalid price data:', { currentPrice, price24hAgo });
                return 'NaN';
            }
            return ((currentPrice - price24hAgo) / price24hAgo * 100).toFixed(2);
        }
        function displaySearchResults(coins) {
            const searchResultsBody = document.getElementById('searchResultsBody');
            searchResultsBody.innerHTML = '';
            if (coins.length === 0) {
                searchResultsBody.innerHTML = '<tr><td colspan="6" class="text-center">No coins found</td></tr>';
            } else {
                coins.forEach(coin => {
                    const change = calculateChange(coin.currentPrice, coin.price24hAgo);
                    const changeClass = change < 0 ? 'text-danger' : 'text-success';
                    const row = document.createElement('tr');
                    row.innerHTML = `<td>${coin.name}</td>
                             <td>${coin.symbol.toUpperCase()}</td>
                             <td>IDR ${coin.currentPrice.toLocaleString()}</td>
                             <td>IDR ${coin.price24hAgo.toLocaleString()}</td>
                             <td class="${changeClass}">${change}%</td>
                             <td><button class="btn btn-success btn-sm" onclick="addToWatchlist('${coin.symbol}')">Add to Watchlist</button></td>`;
                    searchResultsBody.appendChild(row);
                });
            }
        }



        function addToWatchlist(coinSymbol) {
            if (!watchlist.includes(coinSymbol)) {
                watchlist.push(coinSymbol);
                sessionStorage.setItem('watchlist', JSON.stringify(watchlist));
                displayWatchlist();
            }
        }

        function removeFromWatchlist(coinSymbol) {
            watchlist = watchlist.filter(symbol => symbol !== coinSymbol);
            sessionStorage.setItem('watchlist', JSON.stringify(watchlist));
            displayWatchlist();
        }
        function calculateChange(currentPrice, price24hAgo) {
            if (!currentPrice || !price24hAgo) {
                console.log('Invalid price data:', { currentPrice, price24hAgo });
                return 'NaN';
            }
            return ((currentPrice - price24hAgo) / price24hAgo * 100).toFixed(2);
        }
        async function displayWatchlist() {
            const watchlistBody = document.getElementById('watchlistBody');
            watchlistBody.innerHTML = '';
            const response = await fetch(`https://indodax.com/api/summaries`);
            const data = await response.json();
            const prices24h = data.prices_24h;
            watchlist.forEach(coinSymbol => {
                const coinInfo = data.tickers[coinSymbol];
                if (coinInfo) {
                    const currentPrice = parseFloat(coinInfo.last);
                    const price24hAgo = parseFloat(prices24h[coinSymbol.replace('_', '')]);
                    const change = calculateChange(currentPrice, price24hAgo);
                    const changeClass = change < 0 ? 'text-danger' : 'text-success';
                    const row = document.createElement('tr');
                    row.innerHTML = `<td>${coinSymbol.toUpperCase()}</td>
                             <td>IDR ${currentPrice.toLocaleString()}</td>
                             <td class="${changeClass}">${change}%</td>
                             <td><button class="btn btn-danger btn-sm" onclick="removeFromWatchlist('${coinSymbol}')">Remove</button></td>`;
                    watchlistBody.appendChild(row);
                }
            });
        }


        // Initial load
        displayWatchlist();
    </script>

</body>

</html>