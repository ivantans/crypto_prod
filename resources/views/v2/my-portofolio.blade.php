<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Portofolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>
    @include("components.layouts.navbar")
    <div class="container mt-3">
        <h2 class="text-center mb-4 mt-4 "><strong>My Portofolio</strong></h2>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Coin</th>
                    <th>Buy Price</th>
                    <th>Total Coin</th>
                    <th>Invested</th>
                    <th>Current Price</th>
                    <th>Total Value</th>
                    <th>Profit/Loss</th>
                    <th>Percentage</th>
                    <th>Buy Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="portofolio-table">
                @foreach ($portofolios as $portofolio)
                <tr>
                    <td>{{ $portofolio->coin_id }}</td>
                    <td>{{ $portofolio->buy_price }}</td>
                    <td>{{ $portofolio->total_coin }}</td>
                    <td class="invested"></td>
                    <td class="current-price" data-coin="{{ $portofolio->coin_id }}"></td>
                    <td class="total-value"></td>
                    <td class="profit-loss"></td>
                    <td class="percentage"></td>
                    <td>{{ $portofolio->created_at }}</td>
                    <td>
                        <form class="d-inline" method="post" action="/v2/my-portofolio/delete/{{ $portofolio->id }}">
                            @csrf
                            <button class="btn btn-sm btn-danger" type="submit">Remove</button>
                        </form>
                        <form class="d-inline" method="post" action="{{ url("/v2/transaction-history") }}">
                            @csrf
                            <input type="hidden" name="coin_id" value="{{ $portofolio->coin_id }}">
                            <input type="hidden" name="buy_price" value="{{ $portofolio->buy_price }}">
                            <input type="hidden" name="total_coin" value="{{ $portofolio->total_coin }}">
                            <input type="hidden" name="current_price" class="current-price-input">
                            <input type="hidden" name="buy_date" value="{{ $portofolio->created_at }}">
                            <input type="hidden" name="portofolio_id" value="{{ $portofolio->id }}">
                            <button class="btn btn-sm btn-success" type="submit">Jual</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div id="total-assets-portofolio" class="mt-3">
            <h6>Total Value of All Assets   : <span id="total-value-all-assets"></span></h6>
            <h6>Total Invested              : <span id="total-invested"></span></h6>
            <h6>Total Profit/Loss: <span id="total-profit-loss"></span></h6>
            <h6>Total Percentage: <span id="total-percentage"></span></h6>
        </div>

        <h2 class="text-center mb-4 mt-4 "><strong>My Transaction Histories</strong></h2>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Coin</th>
                    <th>Buy Price</th>
                    <th>Total Coin</th>
                    <th>Invested</th>
                    <th>Harga Jual</th>
                    <th>Total Value</th>
                    <th>Profit/Loss</th>
                    <th>Percentage</th>
                    <th>Buy Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="transaction-history-table">
                @foreach ($transaction_histories as $transaction_history)
                <tr>
                    <td>{{ $transaction_history->coin_id }}</td>
                    <td>{{ $transaction_history->buy_price }}</td>
                    <td>{{ $transaction_history->total_coin }}</td>
                    <td class="invested"></td>
                    <td class="current-price" data-coin="{{ $transaction_history->coin_id }}"></td>
                    <td class="total-value"></td>
                    <td class="profit-loss"></td>
                    <td class="percentage"></td>
                    <td>{{ $transaction_history->buy_date }}</td>
                    <td>
                        <form method="POST" action="{{ url("/v2/transaction-history/delete/$transaction_history->id") }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div id="total-assets-transaction-history" class="mt-3">
            <h6>Total Value of All Assets: <span id="total-value-all-assets-transaction-history"></span></h6>
            <h6>Total Invested: <span id="total-invested-transaction-history"></span></h6>
            <h6>Total Profit/Loss: <span id="total-profit-loss-transaction-history"></span></h6>
            <h6>Total Percentage: <span id="total-percentage-transaction-history"></span></h6>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fetchCoinData = async (coinId) => {
                const response = await fetch(`https://indodax.com/api/ticker/${coinId}`);
                const data = await response.json();
                return parseFloat(data.ticker.last);
            };

            const calculateValues = async (row) => {
                const coinId = row.querySelector('.current-price').dataset.coin;
                const buyPrice = parseFloat(row.children[1].textContent);
                const totalCoin = parseFloat(row.children[2].textContent);
                const currentPrice = await fetchCoinData(coinId);

                const invested = buyPrice * totalCoin;
                const totalValue = currentPrice * totalCoin;
                const profitLoss = totalValue - invested;
                const percentage = (profitLoss / invested) * 100;

                row.querySelector('.invested').textContent = invested.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });
                row.querySelector('.current-price').textContent = currentPrice.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });
                row.querySelector('.total-value').textContent = totalValue.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });
                row.querySelector('.profit-loss').textContent = profitLoss.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });
                row.querySelector('.percentage').textContent = `${percentage.toFixed(2)}%`;

                const currentPriceInput = row.querySelector('.current-price-input');
                if (currentPriceInput) {
                    currentPriceInput.value = currentPrice;
                }

                if (profitLoss > 0) {
                    row.querySelector('.profit-loss').classList.add('text-success');
                    row.querySelector('.percentage').classList.add('text-success');
                } else if (profitLoss < 0) {
                    row.querySelector('.profit-loss').classList.add('text-danger');
                    row.querySelector('.percentage').classList.add('text-danger');
                }

                return { invested, totalValue, profitLoss, percentage };
            };

            const updateTotalValues = async (rows, totalAssetsElem, totalInvestedElem, totalProfitLossElem, totalPercentageElem) => {
                let totalAssetsValue = 0;
                let totalInvestedValue = 0;

                for (const row of rows) {
                    const { invested, totalValue } = await calculateValues(row);
                    totalInvestedValue += invested;
                    totalAssetsValue += totalValue;
                }

                const totalProfitLossValue = totalAssetsValue - totalInvestedValue;
                const totalPercentageValue = (totalProfitLossValue / totalInvestedValue) * 100;

                totalAssetsElem.textContent = totalAssetsValue.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });

                totalInvestedElem.textContent = totalInvestedValue.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });

                totalProfitLossElem.textContent = totalProfitLossValue.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });

                totalPercentageElem.textContent = `${totalPercentageValue.toFixed(2)}%`;
            };

            const portofolioRows = document.querySelectorAll('#portofolio-table tr');
            const transactionHistoryRows = document.querySelectorAll('#transaction-history-table tr');

            updateTotalValues(portofolioRows,
                document.getElementById('total-value-all-assets'),
                document.getElementById('total-invested'),
                document.getElementById('total-profit-loss'),
                document.getElementById('total-percentage'));

            updateTotalValues(transactionHistoryRows,
                document.getElementById('total-value-all-assets-transaction-history'),
                document.getElementById('total-invested-transaction-history'),
                document.getElementById('total-profit-loss-transaction-history'),
                document.getElementById('total-percentage-transaction-history'));
        });
    </script>
</body>

</html>
