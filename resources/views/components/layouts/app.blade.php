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
    <title>Document</title>
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>  
    <div class="cryptohopper-web-widget" data-id="2" data-coins="bitcoin,ethereum,tether,bnb,solana,usd-coin,xrp,staked-ether,dogecoin,lido-staked-ether,the-open-network,cardano,shiba-inu,gaj,avalanche-2,wrapped-steth,tron,polkadot,wrapped-bitcoin,bitcoin-cash,near-protocol,bitcoin-cash-sv,chainlink,matic-network,near,internet-computer,litecoin,leo-token,uniswap,dai,first-digital-usd" data-realtime="on" data-currency="IDR"></div>
    @yield("container")
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://www.cryptohopper.com/widgets/js/script"></script>
</body>
</html> 