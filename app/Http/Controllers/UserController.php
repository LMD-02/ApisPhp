<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
   public function index(){
       return view('user.dashboard');
   }
}
