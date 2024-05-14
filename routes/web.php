<?php

use App\Livewire\Alarm;
use App\Livewire\Market;
use App\Livewire\MarketDetail;
use App\Mail\AlarmEmail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/market', function () {
//     return view('components.layouts.app');
// });

Route::get("/market", Market::class)->name("market.index");
Route::post("/market/{c_id}/{c_name}", MarketDetail::class)->name("market.detail");
Route::get("/", function(){
    return redirect()->route('market.index');
});

Route::get("/test", function(){
    $response = Http::get("https://indodax.com/api/ticker/btcidr")->json();
    dd($response["ticker"]["last"]);
});

Route::get("/mail", function(){
    Mail::to("ivantanjaya77@gmail.com")->send(new AlarmEmail("test"));
});