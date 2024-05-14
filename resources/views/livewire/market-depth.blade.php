<div class="container mt-3 d-flex justify-content-between">
    <div class="border rounded" style="width: 49%">
        <div class="bg-primary rounded-top px-3 py-3 text-white ">
            <h3>Market Jual</h3>
        </div>
        <div class="px-3 pt-3 pb-1" style="max-height: 400px; overflow-y: auto;">
            {{-- @dump($d_sell) --}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Harga</th>
                        <th scope="col">Coin</th>
                        <th scope="col">IDR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($d_sell as $key => $value)
                        <tr>
                            <td>{{ Number::format($d_sell[$key][0]) }}</td>
                            <td>{{ $d_sell[$key][1] }}</td>
                            <td>{{ ($d_sell[$key][0]*$d_sell[$key][1]>= 50000000)?Number::format($d_sell[$key][0]*$d_sell[$key][1]) . '🔥': Number::format($d_sell[$key][0]*$d_sell[$key][1])}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="border rounded" style="width: 49%">
        <div class="bg-primary rounded-top px-3 py-3 text-white ">
            <h3>Market Beli</h3>
        </div>
        <div class="px-3 pt-3 pb-1" style="max-height: 400px; overflow-y: auto;">
            {{-- @dump($d_sell) --}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Harga</th>
                        <th scope="col">Coin</th>
                        <th scope="col">IDR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($d_sell as $key => $value)
                        <tr>
                            <td>{{ Number::format($d_buy[$key][0]) }}</td>
                            <td>{{ $d_buy[$key][1] }}</td>
                            <td>{{ ($d_buy[$key][0]*$d_buy[$key][1] >= 50000000) ? Number::format($d_buy[$key][0]*$d_buy[$key][1]) . '🔥' : Number::format($d_buy[$key][0]*$d_buy[$key][1])}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button id="getdata" wire:click='getData' class="btn">.</button>
        </div>
    </div>
</div>

@script
<script>
     setInterval(() => {
        document.querySelector('#getdata').click(); // Klik tombol dengan kelas 'btn'
    }, 5000);
</script>
@endscript
