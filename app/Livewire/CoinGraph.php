<?php

namespace App\Livewire;

use Livewire\Component;

class CoinGraph extends Component
{   
    public $c_name; 
    public function render()
    {
        return view('livewire.coin-graph', [
            "c_name" => $this->c_name,
        ])->layout("market.market-detail");
    }

    public function mount()
    {

        $this->getParameter();
    }

    public function getParameter(){
        $c_name = \Route::current()->parameter('c_name');

        $this->c_name = $c_name;

    }
}
