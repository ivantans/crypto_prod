<?php

namespace App\Http\Controllers;

use App\Models\Alarm;
use Illuminate\Http\Request;

class AlarmController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            "email" => "required|email",
            "top_price" => "required|numeric|min:0",
            "bottom_price" => "required|numeric|min:0",
            "coin_id" => "required"
        ]);

        Alarm::create([
            "email" => $validatedData["email"],
            "top_price" => $validatedData["top_price"],
            "bottom_price" => $validatedData["bottom_price"],
            "c_id" => $validatedData["coin_id"],
        ]);

        
        return redirect()->back()->with('success', 'Alarm berhasil ditambahkan!');
    }
}
