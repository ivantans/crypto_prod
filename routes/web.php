<?php

use App\Livewire\Market;
use App\Livewire\MarketDetail;
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
Route::get("/market/{id}", MarketDetail::class)->name("market.detail");
Route::get("/test", function(){
    return view("test.test");
});