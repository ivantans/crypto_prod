<!-- resources/views/livewire/market-detail.blade.php -->



<div class="container">

    <div class="mt-3 border rounded">
        <div class="rounded-top bg-primary text-white p-3">         
            <h3>Buat pengingat</h3>
            <i>Kami akan mengirimkan notifikasi email saat harga menyentuh harga yang anda inginkan</i>
        </div>
        <div class="p-3">
            <form wire:submit='save'>
                <div class="">
                    <input wire:model='email' type="text" class="form-control" id="email" placeholder="Email anda">
                </div>
                <div class="mt-1">
                    @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mt-3">
                    <input wire:model='top_price' type="number" class="form-control" id="top_price"
                        placeholder="Target harga atas dalam IDR">
                </div>
                <div class="mt-1">
                    @error('top_price') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mt-3">
                    <input wire:model='bottom_price' type="number" class="form-control" id="bottom_price"
                        placeholder="Target harga bawah dalam IDR">
                </div>
                <div class="mt-1">
                    @error('bottom_price') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3 fs-5">Pasang pengingat</button>
                @session('status')
                <div class="mt-1 text-success fw-bold">
                    <p>{{ $value }}</p>
                </div>
                @endsession
            </form>
        </div>
    </div>
</div>