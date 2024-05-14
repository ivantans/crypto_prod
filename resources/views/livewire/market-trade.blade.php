<div class="container py-3">
    <div class="border rounded">
        <div class="bg-primary rounded-top px-3 py-3 text-white ">
            <h3>Aktivitas Market</h3>
        </div>
        <div class="px-3 pt-3 pb-1" style="max-height: 400px; overflow-y: auto;">
            {{-- @dump($data) --}}
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
                <tbody>
                    @foreach($data as $key => $value)
                        <tr>
                            <td>{{ date("Y-m-d H:i:s", $data[$key]["date"] )}}</td>
                            <td class="{{ (Str::ucfirst($data[$key]['type']) == 'Buy')?'text-success':'text-danger'}}">{{ Str::ucfirst($data[$key]["type"])}}</td>
                            <td class="{{ (Str::ucfirst($data[$key]['type']) == 'Buy')?'text-success':'text-danger'}}">{{ Number::format($data[$key]["price"]) }}</td>
                            <td>{{ $data[$key]["amount"] }}</td>
                            <td>{{ Number::format($data[$key]["price"]*$data[$key]["amount"])}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <button id="getdata" wire:click='getData' class="btn">.</button>
</div>


@script
<script>
     setInterval(() => {
        document.querySelector('#getdata').click(); // Klik tombol dengan kelas 'btn'
    }, 5000);
</script>
@endscript