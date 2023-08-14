<?php

namespace App\Http\Controllers;


use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        if(!auth()->user()){
            return redirect()->route('login');
        }
        $userSocial['facebook'] = DB::table('user_configs')->where('type', 'facebook')->where('user_id', auth()->user()->id)->first();
        $userSocial['google']   = DB::table('user_configs')->where('type', 'google')->where('user_id', auth()->user()->id)->first();

        $sosialLogin['facebook'] = DB::table('social_logins')->where('user_id', auth()->user()->id)->where('type', 'facebook')->first();
        $sosialLogin['google']   = DB::table('social_logins')->where('user_id', auth()->user()->id)->where('type', 'google')->first();

        $time['facebook'] = DB::table('statistics')->where('user_id', auth()->user()->id)->where('type', 'facebook')->first();
        $time['google']   = DB::table('statistics')->where('user_id', auth()->user()->id)->where('type', 'google')->first();
        return view('user.dashboard', [
            'userSocial' => $userSocial,
            'sosial'     => $sosialLogin,
            'time'       => $time
        ]);
    }

    public function userConfig(Request $request)
    {
        $check = DB::table('user_configs')->where('user_id', auth()->user()->id)->where('type', $request->type)->first();
        if (!$check)
        {
            DB::table('user_configs')->insert(['username'   => $request->name,
                                               'created_at' => now(), 'updated_at' => now()]);
            DB::table('social_logins')->insert(['user_id' => auth()->user()->id, 'type' => $request->type, 'status' => 0, 'created_at' => now(), 'updated_at' => now()]);
        }
        return redirect()->back();
    }

    public function userCheck(Request $request)
    {
        $type   = $request->type;
        $user   = auth()->user();
        $social = DB::table('social_logins')->where('user_id', $user->id)->where('type', $type)->first();
        $config = DB::table('user_configs')->where('user_id', $user->id)->where('type', $type)->first();
        if ($social->otp == $request->name)
        {
            if ($social->remember_token != null)
            {
                if ($request->token_storage == $social->remember_token)
                {
                    if (session()->has('user_' . $type))
                    {
                        session()->forget('user_' . $type);
                    }
                    session()->push('user_' . $type, true);
                    DB::table('social_logins')->where('user_id', $user->id)->where('type', $type)->update(['social_start' => now()]);

                    return response()->json([
                        'status'  => 2,
                        'message' => 'Mã OTP chính xác',
                        'route'   => route('get.social.' . $type),
                    ]);
                }
            }
            return response()->json([
                'status'  => 1,
                'message' => 'Mã OTP chính xác',
                'data'    => $config->username,
                'type'    => $type
            ]);
        }
        else
        {
            return response()->json([
                'status'  => -1,
                'message' => 'Mã otp không chính xác'
            ]);
        }
    }

    public function loginSocial(Request $request)
    {
        $type         = $request->type;
        $user         = auth()->user();
        $config       = DB::table('user_configs')->where('user_id', $user->id)->where('type', $type)->first();
        $accountLogin = DB::table('table_acount_socials')->where('username', $config->username)->where('type', $type)->first();
        if ($accountLogin)
        {
            if ($accountLogin->password == $request->password)
            {
                if (session()->has('user_' . $type))
                {
                    session()->forget('user_' . $type);
                }
                session()->push('user_' . $type, true);
                $token = Str::random(30);
                DB::table('social_logins')->where('user_id', $user->id)->where('type', $type)->update(['remember_token' => $token]);
                DB::table('social_logins')->where('user_id', $user->id)->where('type', $type)->update(['social_start' => now()]);
                return response()->json([
                    'status'  => 1,
                    'message' => 'Đăng nhập thành công',
                    'route'   => route('get.social.' . $type),
                    'type'    => $type,
                    'token'   => $token
                ]);
            }
            else
            {
                return response()->json([
                    'status'  => -1,
                    'message' => 'Mật khẩu không chính xác'
                ]);
            }
        }
        else
        {
            return response()->json([
                'status'  => -1,
                'message' => 'Tài khoản không tồn tại'
            ]);
        }
    }

    public function userLogin(Request $request)
    {
        $type   = $request->type;
        $user   = auth()->user();
        $config = DB::table('user_configs')->where('user_id', $user->id)->where('type', $type)->first();
        if ($config->two_factor == 1)
        {
            $randomString = Str::random(6);
            $email        = $user->email;
            DB::table('social_logins')->where('user_id', $user->id)->where('type', $type)->update(['otp' => $randomString]);
            $details = [
                'title' => 'Mã OTP cho xác thực đăng nhập ' . $type . ' của quý khách là:',
                'body'  => $randomString
            ];

            Mail::to($email)->send(new \App\Mails\OtpMail($details));
            return response()->json([
                'status'  => -1,
                'message' => 'Bảo mật đang bật, mã otp đã được gửi tới email của bạn',
                'type'    => $type
            ]);
        }else{
            if ($config->warning == 1)
            {
                if ($request->token_storage != '')
                {
                    $social_login = DB::table('social_logins')->where('user_id', $user->id)->where('type', $type)->first();
                    if ($request->token_storage == $social_login->remember_token)
                    {
                        if (session()->has('user_' . $type))
                        {
                            session()->forget('user_' . $type);
                        }
                        session()->push('user_' . $type, true);
                        DB::table('social_logins')->where('user_id', $user->id)->where('type', $type)->update(['social_start' => now()]);

                        return response()->json([
                            'status'  => 1,
                            'message' => 'Đăng nhập thành công',
                            'route'   => route('get.social.' . $type),
                        ]);
                    }
                }
                $randomString = Str::random(6);
                $email        = $user->email;
                DB::table('social_logins')->where('user_id', $user->id)->where('type', $type)->update(['otp' => $randomString]);
                $details = [
                    'title' => 'Mã OTP cho xác thực đăng nhập ' . $type . ' của quý khách là:',
                    'body'  => $randomString
                ];
                $emailAdmin      = DB::table('users')->where('role_id', 2)->first()->email;
                $detailAdmins = [
                    'title' => 'Cảnh báo đăng nhập',
                    'body'  => 'Vào lúc ' . now() . ' MSV:' . $user->username . ' đã đăng nhập vào ' . $type.' bằng thiết bị mới'
                ];
                Mail::to($emailAdmin)->send(new \App\Mails\WarningMail($detailAdmins));
                Mail::to($email)->send(new \App\Mails\OtpMail($details));
                return response()->json([
                    'status'  => -1,
                    'message' => 'Bạn vừa đăng nhập trên thiết bị mới, vui lòng nhập mã OTP đã được gửi tới email của bạn',
                ]);

            }else{
                if ($request->token_storage != '')
                {
                    $social_login = DB::table('social_logins')->where('user_id', $user->id)->where('type', $type)->first();
                    if ($request->token_storage == $social_login->remember_token)
                    {
                        if (session()->has('user_' . $type))
                        {
                            session()->forget('user_' . $type);
                        }
                        session()->push('user_' . $type, true);
                        DB::table('social_logins')->where('user_id', $user->id)->where('type', $type)->update(['social_start' => now()]);

                        return response()->json([
                            'status'  => 1,
                            'message' => 'Đăng nhập thành công',
                            'route'   => route('get.social.' . $type),
                        ]);
                    }
                }
                return response()->json([
                    'status'  => -2,
                    'message' => 'Vui lòng đăng nhập',
                    'type'    => $type,
                    'data'    => $config->username
                ]);
            }
        }
    }

    public function facebook()
    {
        if (session()->has('user_facebook') && session()->get('user_facebook') == true)
        {
            $data = DB::table('user_configs')->where('user_id', auth()->user()->id)->where('type', 'facebook')->first();
            $socialAccounts = DB::table('table_acount_socials')->where('username', $data->username)->where('type', 'facebook')->first();
            return view('social.facebook', compact('socialAccounts'));

        }
        return redirect()->route('user');
    }

    public function google()
    {
        if (session()->has('user_google') && session()->get('user_google') == true)
        {
            $data = DB::table('user_configs')->where('user_id', auth()->user()->id)->where('type', 'google')->first();
            $socialAccounts = DB::table('table_acount_socials')->where('username', $data->username)->where('type', 'google')->first();
            return view('social.google', compact('socialAccounts'));

        }
        return redirect()->route('user');
    }


    public function logoutGoogle(){
        if (session()->has('user_google'))
        {
            $time = DB::table('statistics')->where('user_id', auth()->user()->id)->where('type', 'google')->first();
            DB::table('social_logins')->where('user_id', auth()->user()->id)->where('type', 'google')->update(['social_end' => now()]);
            $data = DB::table('social_logins')->where('user_id', auth()->user()->id)->where('type', 'google')->first();
            $startTime = new DateTime($data->social_start);
            $endTime = new DateTime($data->social_end);
            $timeInterval = $endTime->diff($startTime);
            $hours = $timeInterval->h;
            $minutes = $timeInterval->i;
            $seconds = $timeInterval->s;
            $check = DB::table('statistics')->where('user_id', auth()->user()->id)->where('type', 'google')->first();
            if($check == null){
                DB::table('statistics')->insert([
                    'user_id' => auth()->user()->id,
                    'type' => 'google',
                    'time' => $hours.':'.$minutes.':'.$seconds
                ]);
            }else{
                if($time->time != ''){
                    $time = explode(':', $time->time);
                    $hours = $hours + $time[0];
                    $minutes = $minutes + $time[1];
                    $seconds = $seconds + $time[2];
                    if($seconds > 60){
                        $seconds = $seconds - 60;
                        $minutes = $minutes + 1;
                    }
                    if($minutes > 60){
                        $minutes = $minutes - 60;
                        $hours = $hours + 1;
                    }
                    $time = $hours.':'.$minutes.':'.$seconds;
                    DB::table('statistics')->where('user_id', auth()->user()->id)->where('type', 'google')->update(['time' => $time]);
                }else{
                    DB::table('statistics')->where('user_id', auth()->user()->id)->where('type', 'google')->update(['time' => $hours.':'.$minutes.':'.$seconds]);
                }
            }



            session()->forget('user_google');
        }
        return redirect()->route('user');
    }

    public function logoutFacebook()
    {
        if (session()->has('user_facebook'))
        {
            $time = DB::table('statistics')->where('user_id', auth()->user()->id)->where('type', 'facebook')->first();
            DB::table('social_logins')->where('user_id', auth()->user()->id)->where('type', 'facebook')->update(['social_end' => now()]);
            $data = DB::table('social_logins')->where('user_id', auth()->user()->id)->where('type', 'facebook')->first();
            $startTime = new DateTime($data->social_start);
            $endTime = new DateTime($data->social_end);
            $timeInterval = $endTime->diff($startTime);
            $hours = $timeInterval->h;
            $minutes = $timeInterval->i;
            $seconds = $timeInterval->s;
            $check = DB::table('statistics')->where('user_id', auth()->user()->id)->where('type', 'facebook')->first();
            if($check == null){
                DB::table('statistics')->insert([
                    'user_id' => auth()->user()->id,
                    'type' => 'facebook',
                    'time' => $hours.':'.$minutes.':'.$seconds
                ]);
            }else{
                if($time->time != ''){
                    $time = explode(':', $time->time);
                    $hours = $hours + $time[0];
                    $minutes = $minutes + $time[1];
                    $seconds = $seconds + $time[2];
                    if($seconds > 60){
                        $seconds = $seconds - 60;
                        $minutes = $minutes + 1;
                    }
                    if($minutes > 60){
                        $minutes = $minutes - 60;
                        $hours = $hours + 1;
                    }
                    $time = $hours.':'.$minutes.':'.$seconds;
                    DB::table('statistics')->where('user_id', auth()->user()->id)->where('type', 'facebook')->update(['time' => $time]);
                }else{
                    DB::table('statistics')->where('user_id', auth()->user()->id)->where('type', 'facebook')->update(['time' => $hours.':'.$minutes.':'.$seconds]);
                }
                session()->forget('user_facebook');
            }

        }
        return redirect()->route('user');
    }
}
