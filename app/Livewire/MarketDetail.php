<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MarketDetail extends Component
{
    public $id;

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
        $response = Http::get("https://indodax.com/api/pairs/".$this->id);
    }

    public function render()
    {
        return view('livewire.market-detail', [
        ])->layout("market.market-detail", [
            "id" => $this->id,
        ]);
    }
}
