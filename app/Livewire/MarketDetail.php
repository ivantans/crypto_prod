<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MarketDetail extends Component
{
    protected $id;
    protected $ticker = [];
    protected $trade = [];
    protected $depth = [];

    public function mount()
    {
        $this->getParameter();
        $this->getData();
    }

    public function getParameter(){
        $id = \Route::current()->parameter('id');
        $this->id = $id;
    }

    public function getData(){
        $ticker = Http::get("https://indodax.com/api/ticker/".$this->id);
        $this->ticker = $ticker->json();
        $trade = Http::get("https://indodax.com/api/trades/".$this->id);
        $this->trade = $trade->json();
        $depth = Http::get("https://indodax.com/api/depth/".$this->id);
        $this->depth = $depth->json();
    }

    public function render()
    {
        return view('livewire.market-detail', [
                "id" => $this->id,
                "ticker" => $this->ticker,
                "trade" => $this->trade,
                "depth" => $this->depth,
        ])->layout("market.market-detail");
    }
}
