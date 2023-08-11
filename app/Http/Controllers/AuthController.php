<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(request $request)
    {
        if(auth()->check()){
            if(auth()->user()->role_id == 2){
                return redirect()->route('admin');
            }else{
                return redirect()->route('user');
            }
        }
        $message = $request->get('errors');

        return view('auth.login', [
            'message' => $message ?? null
        ]);
    }

    public function authCheck(Request $request)
    {
        session()->start();
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($request->only(['username', 'password']))) {
            if(auth()->user()->role_id == 2){
                return redirect()->route('admin');
            }else{
                return redirect()->route('user');
            }
        }

        return redirect()->route('login', ['errors' => 'Sai tài khoản hoặt mật khẩu']);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        Session()->flush();
        $request->session()->invalidate();


        return redirect()->route('login');
    }
}
