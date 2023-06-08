<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function login()
    {
        return view('admin.login');
    }

    public function adminLogin(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'username'  => 'required',
            'password'  => 'required',
        ]);

        if(auth()->attempt(array('username' => $input['username'], 'password' => $input['password'], 'regStatus' => 1))){
            return redirect()->route('users.index');
        }else {
            return redirect()->route('login')->with('error','Username Or Password are incorrect');
        }

    }

    public function logout(Request $request){
        Auth::guard()->logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }


}
