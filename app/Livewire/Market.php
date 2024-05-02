<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Market extends Component
{
    protected $data = [];
    protected $tickers = [];


    public function mount(){
        $this->getData();

        
    }
    public function getData(){
        $allHasUrlLogo = true;
        $response = Http::get("https://indodax.com/api/summaries");
        $this->data = $response->json();
        $this->tickers = $this->data["tickers"];
        
        foreach($this->tickers as $key => $value){
            $tickerKey = str_replace("_", "", $key);
            $price_24h = $this->data["prices_24h"][$tickerKey];
            $percentage = round(((($this->tickers[$key]["last"] - $price_24h)/$price_24h)*100),2,0);
            $this->tickers[$key]["percentage"] = $percentage;
        }

        if($allHasUrlLogo){
            $additional_data = Http::get("https://indodax.com/api/pairs")->json();
            $index = 0;
            foreach($this->tickers as $key => $value){
                $this->tickers[$key]["url_logo"] = $additional_data[$index]["url_logo"];
                $this->tickers[$key]["id"] = $additional_data[$index]["id"];
                $index++;
            }  
            $allHasUrlLogo = false;
        } 


    }
    public function render()
    {
        return view('livewire.market', [
            "tickers" => $this->tickers,
        ])->layout("market.market");
    }
}
