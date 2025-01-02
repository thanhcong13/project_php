<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index() {
        return view('member.mem-login');
    }
    public function login(LoginRequest $request) {
        $credentials = $request->only('email' , 'password');
        if(auth()->guard('member')->attempt($credentials ,  $request->filled('remember'))) {
            $request->session()->regenerate();
            $user = auth()->guard('member')->user();
            return redirect()->route('member.dashboard')->with('message' , ' Login Successfully ! ');
        }
        return back()->withErrors(['email' => "Information login is false !"]);
    }
    public function logout(Request $request)
    {
        Auth::guard('member')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('member.login.form');
    }
}
