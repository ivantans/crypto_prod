{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TradingView Widgets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @include("components.layouts.navbar")

    <div class="container mt-3">
        <h1>My TradingView Widgets</h1>
        <div id="tradingview-widgets" class="row">
            @foreach ($portofolios as $portofolio)
            @php
            $idMapping = [
            "btcidr"=>"BITSTAMP:BTCUSD",
            "1inchidr"=>"BITSTAMP:1INCHUSD",
            "aaidr"=>"POLONIEX:ALVAUSDT",
            "aaveidr"=>"BITSTAMP:AAVEUSD",
            "aazidr"=>"",
            "abbcidr"=>"CRYPTO:ABBCUSD",
            "abiidr"=>"POLONIEX:ABIUSDT",
            "abyssidr"=>"BITTREX:ABYSSBTC",
            "achidr"=>"COINBASE:ACHUSD",
            "actidr"=>"PANCAKESWAP:ATCUSDT_01DEBA",
            "adaidr"=>"BINANCE:ADAUSD",
            "adpidr"=>"",
            "aevoidr"=>"",
            "agiidr"=>"",
            "agixidr"=>"",
            "agldidr"=>"",
            "aiidr"=>"",
            "aiozidr"=>"",
            "algoidr"=>"",
            "aliceidr"=>"",
            "alifidr"=>"",
            "alpacaidr"=>"",
            "altidr"=>"",
            "altlayeridr"=>"",
            "ampidr"=>"",
            "ankridr"=>"",
            "antidr"=>"",
            "aoaidr"=>"",
            "apeidr"=>"",
            "api3idr"=>"",
            "arbidr"=>"",
            "arkmidr"=>"",
            "arpaidr"=>"",
            "arvusdt"=>"",
            "asixv2dr"=>"",
            "ataidr"=>"",
            "atomidr"=>"",
            "attidr"=>"",
            "auctionidr"=>"",
            "audioidr"=>"",
            "avaxidr"=>"",
            "axsidr"=>"",
            "badgeridr"=>"",
            "bakeidr"=>"",
            "balidr"=>"",
            "bandidr"=>"",
            "batidr"=>"",
            "bcdidr"=>"",
            "bchidr"=>"",
            "beamidr"=>"",
            "beltidr"=>"",
            "bgbidr"=>"",
            "bicoidr"=>"",
            "bluridr"=>"",
            "blzidr"=>"",
            "bnbidr"=>"",
            "bntidr"=>"",
            "bnxidr"=>"",
            "bomeidr"=>"",
            "bondidr"=>"",
            "boneidr"=>"",
            "bonkusdt"=>"",
            "boraidr"=>"",
            "botxidr"=>"",
            "briseusdt"=>"",
            "bsvid"=>"",
            "btcusdt"=>"",
            "btgidr"=>"",
            "btridr"=>"",
            "btsidr"=>"",
            "bttusdt"=>"",
            "c98idr"=>"",
            "cakeidr"=>"",
            "cbgidr"=>"",
            "celidr"=>"",
            "celoidr"=>"",
            "celridr"=>"",
            "cfxidr"=>"",
            "chridr"=>"",
            "chtidr"=>"",
            "chzidr"=>"",
            "cindidr"=>"",
            "ckbidr"=>"",
            "cngidr"=>"",
            "coalidr"=>"",
            "colidr"=>"",
            "comboidr"=>"",
            "compidr"=>"",
            "conxidr"=>"",
            "cotiidr"=>"",
            "creidr"=>"",
            "croidr"=>"",
            "crvidr"=>"",
            "ctkidr"=>"",
            "ctsiidr"=>"",
            "cvcidr"=>"",
            "cvxidr"=>"",
            "cyberidr"=>"",
            "dadidr"=>"",
            "daiidr"=>"",
            "daoidr"=>"",
            "daridr"=>"",
            "dashidr"=>"",
            "daxidr"=>"",
            "dctidr"=>"",
            "defiidr"=>"",
            "degenidr"=>"",
            "dentidr"=>"",
            "depidr"=>"",
            "dfgidr"=>"",
            "dgbidr"=>"",
            "dgxidr"=>"",
            "dntidr"=>"",
            "dogeidr"=>"",
            "dotidr"=>"",
            "dviidr"=>"",
            "dydxidr"=>"",
            "efiidr"=>"",
            "egldidr"=>"",
            "elfidr"=>"",
            "emidr"=>"",
            "enaidr"=>"",
            "enjidr"=>"",
            "ensidr"=>"",
            "eosidr"=>"",
            "ergidr"=>"",
            "etcidr"=>"",
            "ethidr"=>"",
            "ethusdt"=>"",
            "ethfiidr"=>"",
            "ethwidr"=>"",
            "eursidr"=>"",
            "eurtidr"=>"",
            "everidr"=>"",
            "fancidr"=>"",
            "fdusdidr"=>"",
            "fetidr"=>"",
            "filidr"=>"",
            "firoidr"=>"",
            "flokiusdt"=>"",
            "flridr"=>"",
            "fluxidr"=>"",
            "ftmidr"=>"",
            "fxsidr"=>"",
            "galagamesidr"=>"",
            "gardusdt"=>"",
            "gictid"=>"",
            "gictusdt"=>"",
            "glchidr"=>"",
            "glmidr"=>"",
            "gmmtidr"=>"",
            "gmtidr"=>"",
            "gnoidr"=>"",
            "grtidr"=>"",
            "gscidr"=>"",
            "gtcidr"=>"",
            "gxcidr"=>"",
            "h2oidr"=>"",
            "hartidr"=>"",
            "hbaridr"=>"",
            "hedgidr"=>"",
            "hftidr"=>"",
            "hibsidr"=>"",
            "highidr"=>"",
            "hitopidr"=>"",
            "hiveidr"=>"",
            "hnstidr"=>"",
            "hntidr"=>"",
            "hotidr"=>"",
            "hpbidr"=>"",
            "icpidr"=>"",
            "idxidr"=>"",
            "idxusdt"=>"",
            "ignisidr"=>"",
            "ilvidr"=>"",
            "imxidr"=>"",
            "injidr"=>"",
            "iostidr"=>"",
            "iotaidr"=>"",
            "iotxidr"=>"",
            "jasmyidr"=>"",
            "jstidr"=>"",
            "jupidr"=>"",
            "kaiidr"=>"",
            "kavaidr"=>"",
            "kdagidr"=>"",
            "kinusdt"=>"",
            "klayidr"=>"",
            "kncidr"=>"",
            "kokidr"=>"",
            "krdidr"=>"",
            "ksmidr"=>"",
            "kunciidr"=>"",
            "ldoidr"=>"",
            "leoidr"=>"",
            "letidr"=>"",
            "leveridr"=>"",
            "lgoldidr"=>"",
            "linaidr"=>"",
            "linkidr"=>"",
            "looksidr"=>"",
            "loomidr"=>"",
            "lptidr"=>"",
            "lqtyidr"=>"",
            "lrcidr"=>"",
            "ltcidr"=>"",
            "lunaidr"=>"",
            "luncidr"=>"",
            "luncusdt"=>"",
            "lyfelidr"=>"",
            "manaidr"=>"",
            "maskidr"=>"",
            "maticidr"=>"",
            "mblidr"=>"",
            "mbxidr"=>"",
            "mctidr"=>"",
            "memeidr"=>"",
            "metaidr"=>"",
            "mkridr"=>"",
            "mlkidr"=>"",
            "mmetaidr"=>"",
            "mntidr"=>"",
            "mrsidr"=>"",
            "mshdidr"=>"",
            "mtcidr"=>"",
            "mtlidr"=>"",
            "multiidr"=>"",
            "muraidr"=>"",
            "musicidr"=>"",
            "nadaidr"=>"",
            "nbtidr"=>"",
            "nearidr"=>"",
            "neoidr"=>"",
            "nexoidr"=>"",
            "nptidr"=>"",
            "nrgidr"=>"",
            "nusaidr"=>"",
            "nxtidr"=>"",
            "obsridr"=>"",
            "oceanidr"=>"",
            "octoidr"=>"",
            "ognidr"=>"",
            "okbidr"=>"",
            "omidr"=>"",
            "omgidr"=>"",
            "omniidr"=>"",
            "ondoidr"=>"",
            "onitidr"=>"",
            "ontidr"=>"",
            "opidr"=>"",
            "orbsidr"=>"",
            "orcidr"=>"",
            "oxtidr"=>"",
            "pandoidr"=>"",
            "paxgidr"=>"",
            "pendleidr"=>"",
            "peopleidr"=>"",
            "pepeidr"=>"",
            "pepeusdt"=>"",
            "perpidr"=>"",
            "pgalaidr"=>"",
            "pixelidr"=>"",
            "plcuusdt"=>"",
            "polsidr"=>"",
            "polyidr"=>"",
            "powridr"=>"",
            "pundixusdt"=>"",
            "pxgusdt"=>"",
            "pyridr"=>"",
            "pythidr"=>"",
            "qntidr"=>"",
            "qtumidr"=>"",
            "radidr"=>"",
            "rdntidr"=>"",
            "renidr"=>"",
            "repidr"=>"",
            "reqidr"=>"",
            "revidr"=>"",
            "rezidr"=>"",
            "rlcidr"=>"",
            "rndridr"=>"",
            "rplidr"=>"",
            "rsridr"=>"",
            "rvmidr"=>"",
            "rvnidr"=>"",
            "sandidr"=>"",
            "sfiidr"=>"",
            "sfpidr"=>"",
            "sgtidr"=>"",
            "shanidr"=>"",
            "shibidr"=>"BITSTAMP:SHIBUSD",
            "shibusdt"=>"",
            "shillidr"=>"",
            "shredidr"=>"",
            "signaidr"=>"",
            "sklidr"=>"",
            "slerfidr"=>"",
            "slpidr"=>"",
            "sntidr"=>"",
            "snxidr"=>"",
            "solidr"=>"",
            "solveidr"=>"",
            "spaceididr"=>"",
            "srmidr"=>"",
            "sspusdt"=>"",
            "ssvidr"=>"",
            "stgidr"=>"",
            "stikidr"=>"",
            "storjidr"=>"",
            "stptidr"=>"",
            "strkidr"=>"",
            "strmidr"=>"",
            "suiidr"=>"",
            "sumoidr"=>"",
            "superverseidr"=>"",
            "sushiidr"=>"",
            "telidr"=>"",
            "tenidr"=>"",
            "tfuelidr"=>"",
            "thetaidr"=>"",
            "thresholdidr"=>"",
            "tiaidr"=>"",
            "titanidr"=>"",
            "tmgidr"=>"",
            "tokenidr"=>"",
            "tokoidr"=>"",
            "tonidr"=>"",
            "trbidr"=>"",
            "trxidr"=>"",
            "tusdidr"=>"",
            "twelveidr"=>"",
            "twtidr"=>"",
            "ucjlidr"=>"",
            "umaidr"=>"",
            "unfiidr"=>"",
            "uniidr"=>"",
            "unixidr"=>"",
            "unmdidr"=>"",
            "usdcidr"=>"",
            "usdpidr"=>"",
            "usdtidr"=>"",
            "uw3idr"=>"",
            "vbgidr"=>"",
            "vcgidr"=>"",
            "vcgusdt"=>"",
            "veloidr"=>"",
            "vetidr"=>"",
            "vexidr"=>"",
            "vidyusdt"=>"",
            "vidyxidr"=>"",
            "voltusdt"=>"",
            "vraidr"=>"",
            "vsysidr"=>"",
            "w3fidr"=>"",
            "wavesidr"=>"",
            "wbtcidr"=>"",
            "wemixidr"=>"",
            "wenidr"=>"",
            "wifidr"=>"",
            "wldidr"=>"",
            "wnxmidr"=>"",
            "wooidr"=>"",
            "wozxidr"=>"",
            "wtecidr"=>"",
            "xaiidr"=>"",
            "xautidr"=>"",
            "xchidr"=>"",
            "xdcidr"=>"",
            "xecusdt"=>"",
            "xemidr"=>"",
            "xlmidr"=>"",
            "xmridr"=>"",
            "xrpidr"=>"",
            "xsgdidr"=>"",
            "xtzidr"=>"",
            "xvsidr"=>"",
            "yfiidr"=>"",
            "yfiiidr"=>"",
            "zecidr"=>"",
            "zetaidr"=>"",
            "zilidr"=>"",
            "zrxidr"=>"",
            ];
            $coin_id_format = strtoupper(str_replace(["idr","usdt"],"",$portofolio->coin_id));
            $cryptocapSymbol = $idMapping[$portofolio->coin_id] == "" ? "CRYPTOCAP:$coin_id_format":$idMapping[$portofolio->coin_id];
            $binanceSymbol = $idMapping[$portofolio->coin_id] == "" ? "BINANCE:$coin_id_format"."USD":$idMapping[$portofolio->coin_id];
            $bitstampSymbol = $idMapping[$portofolio->coin_id] == "" ? "BITSTAMP:$coin_id_format"."USD":$idMapping[$portofolio->coin_id];
            @endphp

            @if ($cryptocapSymbol)

            <div class="col-md-4 mb-3">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                            rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on
                                TradingView</span></a></div>
                    <script type="text/javascript"
                        src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "{{ $cryptocapSymbol }}",
                            "width": 350,
                            "height": 220,
                            "locale": "en",
                            "dateRange": "12M",
                            "colorTheme": "dark",
                            "isTransparent": false,
                            "autosize": false,
                            "largeChartUrl": ""
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
            @endif
            @if ($binanceSymbol)

            <div class="col-md-4 mb-3">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                            rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on
                                TradingView</span></a></div>
                    <script type="text/javascript"
                        src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "{{ $binanceSymbol }}",
                            "width": 350,
                            "height": 220,
                            "locale": "en",
                            "dateRange": "12M",
                            "colorTheme": "dark",
                            "isTransparent": false,
                            "autosize": false,
                            "largeChartUrl": ""
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
            @endif
            @if ($bitstampSymbol)

            <div class="col-md-4 mb-3">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                            rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on
                                TradingView</span></a></div>
                    <script type="text/javascript"
                        src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "{{ $bitstampSymbol }}",
                            "width": 350,
                            "height": 220,
                            "locale": "en",
                            "dateRange": "12M",
                            "colorTheme": "dark",
                            "isTransparent": false,
                            "autosize": false,
                            "largeChartUrl": ""
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
            @endif
            @endforeach
        </div>
    </div>
</body>

</html>

 --}}



 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TradingView Widgets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .delete-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 1;
        }
    </style>
</head>

<body>
    @include("components.layouts.navbar")

    <div class="container mt-3">
        <h1>My TradingView Widgets</h1>
        <div id="tradingview-widgets" class="row">
            @foreach ($portofolios as $portofolio)
            @php
            $idMapping = [
            "btcidr"=>"BITSTAMP:BTCUSD",
            "1inchidr"=>"BITSTAMP:1INCHUSD",
            "aaidr"=>"POLONIEX:ALVAUSDT",
            "aaveidr"=>"BITSTAMP:AAVEUSD",
            "abbcidr"=>"CRYPTO:ABBCUSD",
            "abiidr"=>"POLONIEX:ABIUSDT",
            "abyssidr"=>"BITTREX:ABYSSBTC",
            "achidr"=>"COINBASE:ACHUSD",
            "actidr"=>"PANCAKESWAP:ATCUSDT_01DEBA",
            "adaidr"=>"BINANCE:ADAUSD",
            "shibidr"=>"BITSTAMP:SHIBUSD",
            // Add more mappings as needed
            ];
            $coin_id_format = strtoupper(str_replace(["idr","usdt"],"",$portofolio->coin_id));
            $cryptocapSymbol = $idMapping[$portofolio->coin_id]  ?? "CRYPTOCAP:$coin_id_format";
            $binanceSymbol = $idMapping[$portofolio->coin_id]  ?? "BINANCE:$coin_id_format"."USD";
            $bitstampSymbol = $idMapping[$portofolio->coin_id]  ?? "BITSTAMP:$coin_id_format"."USD";
            @endphp

            @if ($cryptocapSymbol)
            <div class="col-md-4 mb-3 position-relative widget-container">
                <button class="btn btn-danger delete-btn" onclick="deleteWidget(this)">Delete</button>
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                            rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on
                                TradingView</span></a></div>
                    <script type="text/javascript"
                        src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "{{ $cryptocapSymbol }}",
                            "width": 350,
                            "height": 220,
                            "locale": "en",
                            "dateRange": "12M",
                            "colorTheme": "dark",
                            "isTransparent": false,
                            "autosize": false,
                            "largeChartUrl": ""
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
            @endif

            @if ($binanceSymbol)
            <div class="col-md-4 mb-3 position-relative widget-container">
                <button class="btn btn-danger delete-btn" onclick="deleteWidget(this)">Delete</button>
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                            rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on
                                TradingView</span></a></div>
                    <script type="text/javascript"
                        src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "{{ $binanceSymbol }}",
                            "width": 350,
                            "height": 220,
                            "locale": "en",
                            "dateRange": "12M",
                            "colorTheme": "dark",
                            "isTransparent": false,
                            "autosize": false,
                            "largeChartUrl": ""
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
            @endif

            @if ($bitstampSymbol)
            <div class="col-md-4 mb-3 position-relative widget-container">
                <button class="btn btn-danger delete-btn" onclick="deleteWidget(this)">Delete</button>
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                            rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on
                                TradingView</span></a></div>
                    <script type="text/javascript"
                        src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "{{ $bitstampSymbol }}",
                            "width": 350,
                            "height": 220,
                            "locale": "en",
                            "dateRange": "12M",
                            "colorTheme": "dark",
                            "isTransparent": false,
                            "autosize": false,
                            "largeChartUrl": ""
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
            @endif

            @endforeach
        </div>
    </div>

    <script>
        function deleteWidget(button) {
            const widgetContainer = button.closest('.widget-container');
            widgetContainer.remove();
        }
    </script>
</body>

</html>
