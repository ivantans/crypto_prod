<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\TransactionHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{

    public function index()
    {
        if (!auth()->user()) {
            return redirect("/v2/login");
        }
        $user = auth()->user();
        $portofolios = $user->portofolios;
        $transaction_histories = $user->transactionHistory;
        return view("v2.my-portofolio", [
            "portofolios" => $portofolios,
            "transaction_histories" => $transaction_histories
        ]);
    }

    public function store(Request $request)
    {
        $user = auth()->user()->id;
        $validatedData = $request->validate([
            "buy_price" => "required|numeric|min:0",
            "total_coin" => "required|numeric|min:0",
            "coin_id" => "required|string",
        ]);

        Portofolio::create([
            "user_id" => $user,
            "buy_price" => $validatedData["buy_price"],
            "total_coin" => $validatedData["total_coin"],
            "coin_id" => $validatedData["coin_id"]
        ]);

        return redirect("/v2/market-detail/$request->coin_id/$request->coin_name")->with('success', 'Portofolio berhasil ditambahkan!');
    }
    public function destroy($id)
    {
        Portofolio::destroy($id);
        return redirect("/v2/my-portofolio");
    }

    public function storeHistory(Request $request)
    {
        $user = auth()->user()->id;
        $validatedData = $request->validate([
            "coin_id" => "required|string",
            "buy_price" => "required|numeric",
            "total_coin" => "required|numeric",
            "current_price" => "required|numeric",
            "buy_date" => "nullable",
        ]);
        TransactionHistory::create([
            "user_id" => $user,
            "coin_id" => $validatedData["coin_id"],
            "buy_price" => $validatedData["buy_price"],
            "total_coin" => $validatedData["total_coin"],
            "current_price" => $validatedData["current_price"],
            "buy_date" => $validatedData["buy_date"] == null?Carbon::now()->toDateTimeString():$validatedData["buy_date"],
        ]);

        if($request->has('portofolio_id')){
            Portofolio::destroy($request->portofolio_id);
        }

        return redirect("/v2/my-portofolio")->with('success', 'Coin berhasil dijual!');
    }

    public function destroyTransactionHistory($id)
    {
        TransactionHistory::destroy($id);
        return redirect("/v2/my-portofolio");
    }


}
