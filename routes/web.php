<?php

use App\Http\Controllers\AlarmController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\TradingViewController;
use App\Mail\AlarmEmail;
use Illuminate\Support\Facades\Mail;
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

// Route::get("/market/{c_id}/{c_name}", MarketDetail::class);
// Route::get("/technical-analysis", TechnicalAnalysis::class);

Route::get("/v2/market", function () {
    return view("v2.market");
});

Route::get("/v2/market-detail/{coin_id}/{coin_name}", function () {
    return view("v2.market-detail");
});

Route::get("/v2/watchlist", function () {
    return view("v2.watchlist");
});
Route::redirect("/","/v2/market");
Route::get("/v2/login", [AuthController::class, "showLoginView"]);
Route::post("/v2/login", [AuthController::class, "login"]);
Route::get("/v2/register", [AuthController::class, "showRegisterView"]);
Route::post("/v2/register", [AuthController::class, "register"]);
Route::post("/v2/logout", [AuthController::class, "logout"]);

Route::post("/v2/portofolio", [PortofolioController::class, "store"]);
Route::get("/v2/my-portofolio", [PortofolioController::class, "index"]);
Route::post("/v2/my-portofolio/delete/{id}", [PortofolioController::class, "destroy"]);
Route::post("/v2/transaction-history", [PortofolioController::class, "storeHistory"]);
Route::post("/v2/transaction-history/delete/{id}", [PortofolioController::class, "destroyTransactionHistory"]);
Route::get("/v2/tradingview", [TradingViewController::class, "index"]);
Route::get("/test", function(){
    return view("v2.test");
});

Route::post("/v2/alarm", [AlarmController::class, "store"]);
Route::get("/mail", function () {
    Mail::to("ivantanjaya77@gmail.com")->send(new AlarmEmail("test"));
});
