<?php

namespace App\Livewire;

use Livewire\Component;

class Alarm extends Component
{
    public function mount(){
        $this->getParameter();
    }
    public function getParameter(){
        $id = \Route::current()->parameter('id');
        $this->id = $id;
    }
    public function render()
    {
        return view('livewire.alarm', [
            "id" => $this->id,
        ])->layout("alarm.alarm");
    }
}
