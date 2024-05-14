<?php

namespace App\Jobs;

use App\Mail\AlarmEmail;
use App\Models\Alarm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $alarms = Alarm::where("is_active",1)->get();

        foreach($alarms as $alarm){
            try{
                $response = Http::get("https://indodax.com/api/ticker/".$alarm['c_id'])->json();
                $current_price = $response["ticker"]["last"];
                $alarmMessage = "Harga " . $alarm['c_id'] . " sekarang adalah " . $current_price;
                if($current_price >= $alarm["top_price"]){
                    Mail::to($alarm["email"])->send(new AlarmEmail($alarmMessage));
                    $alarm->update([
                        "top_price_active" => 0
                    ]);
                    
                }
                if($current_price <= $alarm["bottom_price"]){
                    Mail::to($alarm["email"])->send(new AlarmEmail($alarmMessage));
                    $alarm->update([
                        "bottom_price_active" => 0
                    ]);
                }
                if($alarm["bottom_price_active"] == 0 && $alarm["top_price_active"] == 0){
                    $alarm->update([
                        "is_active" => 0
                    ]);
                }
            } catch(\Exception $e){

            }


        }
    }
}
