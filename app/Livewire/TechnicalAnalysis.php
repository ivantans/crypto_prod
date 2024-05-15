<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Request;
use Livewire\Component;

class TechnicalAnalysis extends Component
{
    public $checkedItems = [];
    public function mount(){
        $this->checkedItems = Request::query('checkedItems', []);
    }
    public function render()
    {
        return view('livewire.technical-analysis',[
            "checkedItems" => $this->checkedItems, 
        ])->layout("market.technical-analysis");
    }
}
