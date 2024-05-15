<div>
    <div class="d-flex flex-wrap">

        @foreach ($checkedItems as $item)
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
            {
            "interval": "1m",
            "width": 425,
            "isTransparent": false,
            "height": 450,
            "symbol": "BINANCE:{{ $item }}USD",
            "showIntervalTabs": true,
            "displayMode": "single",
            "locale": "en",
            "colorTheme": "dark"
        }
            </script>
        </div>
    
    
        @endforeach
    </div>
</div>
