<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MarketTrade extends Component
{

    public $c_id;
    public $data = [];
    public function mount(){
        $c_id = $c_id = \Route::current()->parameter('c_id');
        $this->c_id = $c_id;
        $this->getData();
    }
    public function getData(){
        $response = Http::get("https://indodax.com/api/trades/".$this->c_id)->json();
        $this->data = $response; 
    }
    public function render()
    {
        return view('livewire.market-trade', [
            "c_id" => $this->c_id,
            "data" => $this->data,
        ])->layout("market.market-detail");
    }
}
