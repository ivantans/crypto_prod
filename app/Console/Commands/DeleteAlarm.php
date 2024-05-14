<?php

namespace App\Console\Commands;

use App\Models\Alarm;
use Illuminate\Console\Command;

class DeleteAlarm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-alarm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $alarms = Alarm::where("is_active", 0)->get();
        foreach ($alarms as $alarm) {
            $alarm->delete();
        }
    }
}
