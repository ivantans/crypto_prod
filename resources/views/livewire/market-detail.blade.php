<!-- resources/views/livewire/market-detail.blade.php -->

<div>
    <h1>Detail Data</h1>
    <form action="/market/{{ $id }}/alarm" method="post">
        @csrf
        <button type="submit" class="btn btn-primary"><i class="bi bi-alarm"></i> Pasang alarm</button>
    </form>
    
    <h1>Ticker</h1>
    @dump($ticker);
    <h1>Trade</h1>
    @dump($trade);
    <h1>Depth</h1>
    @dump($depth);
</div>