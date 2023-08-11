<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class checkTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check-time:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = DB::table('statistics')->get();
        foreach ($data as $item){
            $timeStr = $item->time;
            $thresholdStr = "1:00:00";
            $time = Carbon::parse($timeStr);
            $threshold = Carbon::parse($thresholdStr);

            if($time->greaterThan($threshold)){
                DB::table('social_logins')->where('user_id',$item->user_id)->where('type',$item->type)->update(['status'=>-1]);
            }
        }

    }
}
