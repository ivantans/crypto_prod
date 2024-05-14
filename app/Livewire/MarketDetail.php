<?php

namespace App\Livewire;

use App\Models\Alarm;
use Livewire\Attributes\Validate;
use Livewire\Component;

class MarketDetail extends Component
{
    public $c_id;

    #[Validate("required|email")]
    public $email = '';

    #[Validate("required|numeric|min:0")]
    public $top_price = '';

    #[Validate("required|numeric|min:0")]
    public $bottom_price = '';

    public function mount()
    {

        $this->getParameter();
    }

    public function save(){
        $c_id = $this->c_id;
        $this->validate();
        Alarm::create([
            "email" => $this->email,
            "top_price" => $this->top_price,
            "bottom_price" => $this->bottom_price,
            "c_id" => $c_id,
        ]);
        session()->flash('status', 'Pengingat berhasil dipasang');
        $this->email="";
        $this->top_price="";
        $this->bottom_price="";
    }

    public function getParameter(){
        $c_id = \Route::current()->parameter('c_id');
        $this->c_id = $c_id;
    }


    public function render()
    {
        $this->getParameter();
        return view('livewire.market-detail')->layout("market.market-detail");
    }
}
