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
       return view('admin.dashboard',['data'=>$users]);
   }
}
