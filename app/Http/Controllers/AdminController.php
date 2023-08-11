<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
   public function index(){
       $users = DB::table('users')->where('id','!=',auth()->user()->id)->paginate();
       foreach ($users as $user){
           $user->facebook = DB::table('social_logins')->where('user_id',$user->id)->where('type','facebook')->first();
           $user->facebookTime = DB::table('statistics')->where('user_id',$user->id)->where('type','facebook')->first()->time ?? 0;
           $user->google = DB::table('social_logins')->where('user_id',$user->id)->where('type','google')->first();
           $user->googleTime = DB::table('statistics')->where('user_id',$user->id)->where('type','google')->first()->time ?? 0;
       }
       return view('admin.dashboard',['data'=>$users]);
   }

   public function updateStatus(Request $request){
         $id = $request->user_id;
         $status = $request->status;
         $type = $request->type;
         DB::table('social_logins')->where('user_id',$id)->where('type',$type)->update(['status'=>$status]);
         return redirect()->back();
   }
}
