<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MarketDepth extends Component
{
    public $c_id;
    public $d_buy;
    public $d_sell;

    public function mount(){
        $c_id = \Route::current()->parameter('c_id');
        $this->c_id = $c_id;
        $this->getData();
    }

    public function getData(){
        $response = Http::get("https://indodax.com/api/depth/btcidr")->json();
        $this->d_buy = $response["buy"];
        $this->d_sell = $response["sell"];
    }

    public function render()
    {
        return view('livewire.market-depth', [
            "c_id" => $this->c_id,
            "d_buy" => $this->d_buy,
            "d_sell" => $this->d_sell,
        ])->layout("market.market-detail");
    }
}
