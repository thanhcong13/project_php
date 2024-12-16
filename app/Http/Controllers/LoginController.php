<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function store(Request $request){
        $cre = $request->only('email','password');
        if(Auth::attempt($cre)){
            return redirect()->route('dashboard')->with('success','Login successfully !');
        }
        else{
            return redirect()->route('login')->with('error','Login false');
        }
    }
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
