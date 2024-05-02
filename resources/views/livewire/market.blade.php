
<div>
    <button id="getdata" wire:click='getData' class="btn">-</button>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">id</th>
                    <th scope="col">Nama Aset</th>
                    <th scope="col">Buy</th>
                    <th scope="col">percentage</th>
                    <th scope="col">More</th>

                </tr>
            </thead>
            <tbody>
                @foreach($tickers as $key => $ticker)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ticker["id"] }}</td>
                        <td><img class="mb-1" src="{{ $ticker['url_logo'] }}" alt="SVG Image" width="25" height="25" loading="lazy"> {{ $ticker['name'] }}</td>
                        <td>{{ Number::format($ticker['buy']) }}</td>
                        <td class="{{ $ticker['percentage'] < 0 ? "text-danger":"text-success" }}">{{ $ticker['percentage'] }}%</td>
                        <td><a class="btn" href="/market/{{ $ticker["id"] }}">More</a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    
    
    
</div>


    @script
    <script>
         setInterval(() => {
            document.querySelector('#getdata').click(); // Klik tombol dengan kelas 'btn'
        }, 5000);
    </script>
    @endscript

    {{-- onclick='window.location.href="https://youtube.com"' style="cursor: pointer" --}}