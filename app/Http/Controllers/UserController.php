<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use MongoDB\Driver\Session;

class UserController extends Controller
{
   public function index(){
       $userSocial['facebook'] = DB::table('user_configs')->where('type','facebook')->where('user_id',auth()->user()->id)->first();
       $userSocial['google'] = DB::table('user_configs')->where('type','google')->where('user_id',auth()->user()->id)->first();

       $sosialLogin['facebook'] = DB::table('social_logins')->where('user_id',auth()->user()->id)->where('type','facebook')->first();
       $sosialLogin['google'] = DB::table('social_logins')->where('user_id',auth()->user()->id)->where('type','google')->first();
       return view('user.dashboard',[
           'userSocial'=>$userSocial,
           'sosial' => $sosialLogin,
       ]);
   }

   public function userConfig(Request $request){
         $check = DB::table('user_configs')->where('user_id',auth()->user()->id)->where('type',$request->type)->first();
         if($check){
                DB::table('user_configs')->where('user_id',auth()->user()->id)->where('type',$request->type)->update(['warning'=>$request->warning,'two_factor'=>$request->check]);
         }else{
                DB::table('user_configs')->insert(['username'=>$request->name,'user_id'=>auth()->user()->id,'type'=>$request->type,'warning'=>$request->warning,'two_factor'=>$request->check,
                                                   'created_at'=>now(),'updated_at'=>now()]);
         }
         return redirect()->back();
   }

    public function userCheck(Request $request){
       $type = $request->type;
       $user = auth()->user();
       $social = DB::table('social_logins')->where('user_id',$user->id)->where('type',$type)->first();
       $config = DB::table('user_configs')->where('user_id',$user->id)->where('type',$type)->first();
        if($social->otp == $request->name){
           return response()->json([
               'status' => 1,
               'message' => 'Mã OTP chính xác',
               'data' => $config->username,
               'type' => $type
           ]);
       }else{
              return response()->json([
                'status' => -1,
                'message' => 'Mã otp không chính xác'
              ]);
       }
    }

    public function loginSocial(Request $request){
        $type = $request->type;
        $user = auth()->user();
        $config = DB::table('user_configs')->where('user_id',$user->id)->where('type',$type)->first();
        $accountLogin = DB::table('table_acount_socials')->where('username',$config->username)->where('type',$type)->first();
        if($accountLogin){
            if($accountLogin->password == $request->password)
            {
                if(session()->has('user_'.$type))
                {
                    session()->forget('user_'.$type);
                }
                session()->push('user_'.$type,true);
                return response()->json([
                    'status'  => 1,
                    'message' => 'Đăng nhập thành công',
                    'route'   => route('user.social.'.$type),
                ]);
            }else{
                return response()->json([
                    'status'  => -1,
                    'message' => 'Mật khẩu không chính xác'
                ]);
            }
        }else{
            return response()->json([
                'status'  => -1,
                'message' => 'Tài khoản không tồn tại'
            ]);
        }
    }

   public function userLogin(Request $request){
       $type = $request->type;
       $user = auth()->user();
       $config = DB::table('user_configs')->where('user_id',$user->id)->where('type',$type)->first();
       if($config->two_factor == 1)
       {
           $randomString = Str::random(6);
           $email = $user->email;
           DB::table('social_logins')->where('user_id',$user->id)->where('type',$type)->update(['otp'=>$randomString]);
           $details = [
               'title' => 'Mã OTP cho xác thực đăng nhập ' . $type . ' của quý khách là:',
               'body' => $randomString
           ];

           Mail::to($email)->send(new \App\Mails\OtpMail($details));
           return response()->json([
               'status' => -1,
               'message' => 'Mã otp đã được gửi tới email của bạn'
           ]);
       }
//       else{
//           if($config->warning == 1)
//           {
//
//           }
//       }

   }
}
