{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body>
        {{ $slot }}
    </body>
</html> --}}
@php
    use Illuminate\Support\Number;
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TIMOTHY RAJA SLOT</title>
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://widget-harga.tokocrypto.com/widget/api" async></script>
    <script src="https://widgets.coingecko.com/coingecko-coin-price-chart-widget.js"></script>
    <style>
        .sticky-bottom {
            position: fixed;
            bottom: -30px;
            left: 50%;
            transform: translateX(-50%); 
            z-index: 1000;
        }
    </style>
    
</head>
<body>
    @yield("container")
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://www.cryptohopper.com/widgets/js/script"></script>
    <div class="tokocrypto-widget sticky-bottom" data-pair="IDR" data-symbol="BTC_IDR,ETH_IDR" data-type="3" data-theme="light" data-transparent="false" data-speed="1"></div>
</body>
</html> 