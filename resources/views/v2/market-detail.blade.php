@php
    $coin_id = Route::current()->parameter('coin_id');
    $coin_name = Route::current()->parameter('coin_name');
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coin Market Detail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @include("components.layouts.navbar")
    <div>
        <div class="container mt-3">
            <h1 id="coin-name">{{ $coin_name }} Information</h1>
            <script src="https://widgets.coingecko.com/coingecko-coin-price-chart-widget.js"></script>
            <div id="graph">
                <coingecko-coin-price-chart-widget coin-id="{{ $coin_name }}" currency="idr" height="300" locale="id">
                </coingecko-coin-price-chart-widget>
            </div>
        </div>
    </div>

    <div class="container mt-3 d-flex justify-content-between">
        <div class="border rounded" style="width: 49%">
            <div class="bg-primary rounded-top px-3 py-3 text-white">
                <h3>Portofolio anda</h3>
                <i>Masukan coin yang anda punya</i>
            </div>
            <div class="m-3">
                <form action="{{ url('/v2/portofolio') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="buy_price" class="form-label">Harga Coin beli</label>
                        <input type="number" step="any" name="buy_price"
                            class="form-control @error('buy_price') is-invalid @enderror" id="buy_price"
                            placeholder="100000">
                        @error('buy_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="total_coin" class="form-label">Total coin</label>
                        <input type="number" step="any" name="total_coin"
                            class="form-control @error('total_coin') is-invalid @enderror" id="total_coin"
                            placeholder="Masukkan target harga">
                        @error('total_coin')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <input id="form-coin-id" type="hidden" name="coin_id" value="{{ $coin_id }}">
                    <input id="form-coin-id" type="hidden" name="coin_name" value="{{ $coin_name }}">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <a class="link-btn btn btn-primary" href="/v2/my-portofolio">Lihat portofolio</a>
                    @session('success')
                    <p>{{ $value }}</p>
                    @endsession
                </form>
            </div>
        </div>

        <div class="border rounded" style="width: 49%">
            <div class="bg-primary rounded-top px-3 py-3 text-white">
                <h3>History Portofolio</h3>
                <i>Masukan coin yang pernah diperjual belikan</i>
            </div>
            <div class="m-3">
                <form action="{{ url('/v2/transaction-history') }}" method="POST">
                    @csrf
                    <input id="form-coin-id" type="hidden" name="coin_id" value="{{ $coin_id }}">
                    <div class="mb-1">
                        <label for="buy_price" class="form-label">Harga Coin beli</label>
                        <input type="number" step="any" name="buy_price"
                            class="form-control @error('buy_price') is-invalid @enderror" id="buy_price"
                            placeholder="100000">
                        @error('buy_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="total_coin" class="form-label">Total coin</label>
                        <input type="number" step="any" name="total_coin"
                            class="form-control @error('total_coin') is-invalid @enderror" id="total_coin"
                            placeholder="Masukan total coin yang anda beli">
                        @error('total_coin')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="current_price" class="form-label">Harga Jual</label>
                        <input type="number" step="any" name="current_price"
                            class="form-control @error('current_price') is-invalid @enderror" id="current_price"
                            placeholder="Masukan harga jual anda">
                        @error('current_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="buy_date" class="form-label">Tanggal beli (opsional)</label>
                        <input type="date" step="any" name="buy_date"
                            class="form-control @error('buy_date') is-invalid @enderror" id="buy_date">
                        @error('buy_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <a class="link-btn btn btn-primary" href="/v2/my-portofolio">Lihat portofolio</a>
                    @session('success')
                    <p>{{ $value }}</p>
                    @endsession
                </form>
            </div>
        </div>
    </div>
    
    <div class="container">

        <div class="mt-3 border rounded">
            <div class="rounded-top bg-primary text-white p-3">
                <h3>Buat pengingat</h3>
                <i>Kami akan mengirimkan notifikasi email saat harga menyentuh harga yang anda inginkan</i>
            </div>
            <div class="p-3">
                <form wire:submit='save'>
                    <div class="">
                        <input wire:model='email' type="text" class="form-control" id="email" placeholder="Email anda">
                    </div>
                    <div class="mt-1">
                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-3">
                        <input wire:model='top_price' type="number" class="form-control" id="top_price"
                            placeholder="Target harga atas dalam IDR">
                    </div>
                    <div class="mt-1">
                        @error('top_price') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-3">
                        <input wire:model='bottom_price' type="number" class="form-control" id="bottom_price"
                            placeholder="Target harga bawah dalam IDR">
                    </div>
                    <div class="mt-1">
                        @error('bottom_price') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 fs-5">Pasang pengingat</button>
                    @session('status')
                    <div class="mt-1 text-success fw-bold">
                        <p>{{ $value }}</p>
                    </div>
                    @endsession
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="mt-3 border rounded">
            <div class="rounded-top bg-primary text-white p-3">
                <h3>Berita terkini</h3>
            </div>
            <div id="news-container" class="px-3 py-2" style="max-height: 600px; overflow-y: auto;">
                <!-- News articles will be injected here by JavaScript -->
            </div>
        </div>
    </div>

    <div class="container mt-3 d-flex justify-content-between">
        <div class="border rounded" style="width: 49%">
            <div class="bg-primary rounded-top px-3 py-3 text-white">
                <h3>Market Jual</h3>
            </div>
            <div class="px-3 pt-3 pb-1" style="max-height: 400px; overflow-y: auto;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Harga</th>
                            <th scope="col">Coin</th>
                            <th scope="col">IDR</th>
                        </tr>
                    </thead>
                    <tbody id="sell-market">
                    </tbody>
                </table>
            </div>
        </div>

        <div class="border rounded" style="width: 49%">
            <div class="bg-primary rounded-top px-3 py-3 text-white">
                <h3>Market Beli</h3>
            </div>
            <div class="px-3 pt-3 pb-1" style="max-height: 400px; overflow-y: auto;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Harga</th>
                            <th scope="col">Coin</th>
                            <th scope="col">IDR</th>
                        </tr>
                    </thead>
                    <tbody id="buy-market">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="border rounded">
            <div class="bg-primary rounded-top px-3 py-3 text-white">
                <h3>Aktivitas Market</h3>
            </div>
            <div class="px-3 pt-3 pb-1" style="max-height: 400px; overflow-y: auto;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Coin</th>
                            <th scope="col">IDR</th>
                        </tr>
                    </thead>
                    <tbody id="market-activity">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            const urlSegments = window.location.pathname.split('/');
            const coin_id = urlSegments[3];
            const coin_name = urlSegments[4];

            updateCoinName(coin_name);
            await fetchAndUpdateData(coin_id);

            setInterval(async () => {
                await fetchAndUpdateData(coin_id);
            }, 10000);

            await fetchNews(coin_name);
        });

        function updateCoinName(coin_name) {
            // document.getElementById('coin-name').innerText = `${coin_name} Information`;
            document.querySelector('coingecko-coin-price-chart-widget').setAttribute('coin-id', coin_name);
        }

        async function fetchAndUpdateData(coin_id) {
            if (!coin_id) return;

            try {
                const [tradesData, depthData] = await Promise.all([
                    fetchData(`https://indodax.com/api/trades/${coin_id}`),
                    fetchData(`https://indodax.com/api/depth/${coin_id}`)
                ]);

                populateTradesTable(tradesData);
                populateDepthTables(depthData);
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }

        async function fetchData(url) {
            const response = await fetch(url);
            return response.json();
        }

        function populateTradesTable(trades) {
            const tbody = document.getElementById('market-activity');
            tbody.innerHTML = '';
            trades.forEach(trade => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${new Date(trade.date * 1000).toLocaleString()}</td>
                    <td>${trade.type}</td>
                    <td>${trade.price}</td>
                    <td>${trade.amount}</td>
                    <td>${(trade.price * trade.amount).toFixed(2)}</td>
                `;
                tbody.appendChild(row);
            });
        }

        function populateDepthTables(depth) {
            populateTable(document.getElementById('buy-market'), depth.buy);
            populateTable(document.getElementById('sell-market'), depth.sell);
        }

        function populateTable(tbody, data) {
            tbody.innerHTML = '';
            data.forEach(order => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${order[0]}</td>
                    <td>${order[1]}</td>
                    <td>${(order[0] * order[1]).toFixed(2)}</td>
                `;
                tbody.appendChild(row);
            });
        }

        async function fetchNews(coin_name) {
            try {
                const response = await fetch(`https://cryptonews-api.com/api/v1?tickers=${coin_name}&items=3&token=qq54gfmn8wbly4l74uepmqnv9vptrlno4sd6xgyf`);
                const data = await response.json();
                populateNewsContainer(data.data);
            } catch (error) {
                console.error('Error fetching news:', error);
            }
        }

        function populateNewsContainer(news) {
        const newsContainer = document.getElementById('news-container');
        newsContainer.innerHTML = '';

        news.forEach(article => {
            const newsArticle = document.createElement('a');
            newsArticle.href = article.news_url;
            newsArticle.target = "_blank";
            newsArticle.classList.add('d-flex', 'mb-3');

            const newsImage = document.createElement('img');
            newsImage.classList.add('img-fluid', 'rounded');
            newsImage.src = article.image_url;
            newsImage.style.width = '200px'; // Set width
            newsImage.style.height = '100px'; // Set height

            const newsText = document.createElement('div');
            newsText.classList.add('p-1', 'flex-grow-1');
            newsText.innerHTML = `
                <div class="fw-bold">${article.title}</div>
                <div>${article.text}</div>
                <div>
                    <small>${article.tickers.join(', ')} | ${article.source_name} | ${new Date(article.date).toLocaleString()} | ${article.sentiment}</small>
                </div>
            `;

            newsArticle.appendChild(newsImage);
            newsArticle.appendChild(newsText);
            newsContainer.appendChild(newsArticle);
        });
    }

    </script>
</body>

</html>