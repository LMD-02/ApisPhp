<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
   public function index(){
       $userSocial['facebook'] = DB::table('user_configs')->where('type','facebook')->first();
     $userSocial['google'] = DB::table('user_configs')->where('type','google')->first();
       $users = DB::table('users')->where('id','!=',auth()->user()->id)->paginate();
       $time = DB::table('time_configs')->first()->time;
       foreach ($users as $user){
           $user->facebook = DB::table('social_logins')->where('user_id',$user->id)->where('type','facebook')->first();
           $user->facebookTime = DB::table('statistics')->where('user_id',$user->id)->where('type','facebook')->first()->time ?? 0;
           $user->google = DB::table('social_logins')->where('user_id',$user->id)->where('type','google')->first();
           $user->googleTime = DB::table('statistics')->where('user_id',$user->id)->where('type','google')->first()->time ?? 0;
       }
       return view('admin.dashboard',['data'=>$users,'userSocial'=>$userSocial,'time'=>$time]);
   }

   public function updateStatus(Request $request){
         $id = $request->user_id;
         $user = DB::table('users')->where('id',$id)->first();
         $status = $request->status;
         $type = $request->type;
         if($status == '-1'){
             $detailAdmins = [
                 'title' => 'Cảnh báo ',
                 'body'  => 'Tài khoản '.$type.' của bạn vừa bị chặn bởi admin. Chi tiết xin liên hệ admin để biết thêm thông tin.'
             ];
         }else{
             $detailAdmins = [
                 'title' => 'Thông báo ',
                 'body'  => 'Tài khoản '.$type.' của bạn vừa được mở khóa bởi admin. Chi tiết xin liên hệ admin để biết thêm thông tin.'
             ];
         }
         Mail::to($user->email)->send(new \App\Mails\WarningMail($detailAdmins));
         DB::table('social_logins')->where('user_id',$id)->where('type',$type)->update(['status'=>$status]);
         return redirect()->back();
   }

    public function updateTime(Request $request){

        DB::table('time_configs')->update(['time'=>$request->time]);
        return redirect()->back();
    }

    public function adminConfig(Request $request)
    {
        DB::table('user_configs')->where('type',$request->type)->update(['two_factor' => $request->check,'warning' => $request->warning]);
        return redirect()->back();
    }

    public function sendWarning(Request $request){
        $detailAdmins = [
            'title' => 'Cảnh báo ',
            'body'  => 'Admin cảnh báo, tài khoản của bạn vừa đăng nhập trên 1 thiết bị mới vui lòng kiểm tra lại. Nếu không phải là bạn vui lòng liên hệ khẩn cấp với Admin để được hỗ trợ !'
        ];
        Mail::to($request->username)->send(new \App\Mails\WarningMail($detailAdmins));
        return redirect()->back();

    }
}
