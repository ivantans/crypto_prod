
<div class="container-sm d-flex">
    {{-- <div class="d-flex flex-column">
        <img src="{{ asset("images/mclarenbos.jpg") }}" alt="" height="300">
        <img src="{{ asset("images/rajaslot.jpg") }}" alt="" height="300">
        <img src="{{ asset("images/mclarenbos.jpg") }}" alt="" height="300">
        <img src="{{ asset("images/rajaslot.jpg") }}" alt="" height="300">
        <img src="{{ asset("images/mclarenbos.jpg") }}" alt="" height="300">
        <img src="{{ asset("images/rajaslot.jpg") }}" alt="" height="300">
        <img src="{{ asset("images/mclarenbos.jpg") }}" alt="" height="300">
        <img src="{{ asset("images/rajaslot.jpg") }}" alt="" height="300">
        <audio controls autoplay loop>
            <source src="{{ asset("images/WhatsApp Audio 2024-05-15 at 05.11.36_58d800ca.mp3") }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio >
        <audio controls autoplay loop>
            <source src="{{ asset("images/ambatukam.mp3") }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio >
    </div> --}}
    <div class="container w-75 mt-3">
        @foreach ($checkedItems as $item)
            {{ $item }}
        @endforeach
        <h1>Coin Market</h1>
        <button class="btn btn-primary" wire:click='redirectToUrl'>Monitor</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Monitor</th>
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
                        <td><input class="form-check-input" type="checkbox" wire:model="checkedItems" value="{{ $ticker['name'] }}"></td>
                        <td><img class="mb-1" src="{{ $ticker['url_logo'] }}" alt="SVG Image" width="25" height="25" loading="lazy"> {{ $ticker['name'] }}</td>
                        <td>{{ Number::format($ticker['buy']) }}</td>
                        <td class="{{ $ticker['percentage'] < 0 ? "text-danger":"text-success" }}">{{ $ticker['percentage'] }}%</td>
                        <td>
                            <form class="d-inline" action="/market/{{ $ticker["id"] }}/{{ $ticker["name"] }}" method="post">
                                @csrf
                                <button class="btn btn-primary" type="submit">More</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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

    {{-- onclick='window.location.href="https://youtube.com"' style="cursor: pointer" --}}