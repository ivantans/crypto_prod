<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TradingViewController extends Controller
{
    public function index(){
        if(!auth()->user()){
            return redirect("/v2/login");
        }

        $user = auth()->user();
        $portofolios = $user->portofolios;
        return view("v2.tradingview", [
            "portofolios" => $portofolios,
        ]);
    }
}
