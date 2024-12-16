<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function store(LoginRequest $request){
        $cre = $request->only('email', 'password');
        
        $remember = $request->has('remember');
        // TODO: remember me 

        if (Auth::attempt($cre,$remember)) {
            if ($remember) {
                setcookie("email",$request->get('email',''),time()+3600);
                setcookie("password",$request->get('password',''),time()+3600);
            } else {
                setcookie('email','');
                setcookie('password','');
            }
            return redirect()->route('dashboard')->with('success','Login successfully !');
        } else{
            return redirect()->route('login');
        }
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
