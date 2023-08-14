<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $time = DB::table('time_configs')->first()->time;
        foreach ($data as $item){
            $timeStr = $item->time;
            $thresholdStr = $time;
            $time = Carbon::parse($timeStr);
            $threshold = Carbon::parse($thresholdStr);

            if($time->greaterThan($threshold)){
                DB::table('social_logins')->where('user_id',$item->user_id)->where('type',$item->type)->where('status','!=',-1)->update(['status'=>-1]);
                $user = DB::table('users')->where('id',$item->user_id)->first();
                $detailAdmins = [
                    'title' => 'Thông báo ',
                    'body'  => 'Tài khoản '.$item->type.' của bạn vừa bị khóa bởi hệ thống nhận thấy bạn đã truy cập quá '.$time.'. Chi tiết xin liên hệ admin để biết thêm thông tin.'
                ];
                Mail::to($user->email)->send(new \App\Mails\WarningMail($detailAdmins));
            }
        }

    }
}
