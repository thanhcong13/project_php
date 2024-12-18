<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(LoginRequest $request)
    {
        $cre = $request->only('email', 'password');

        $remember = $request->has('remember');

        if (Auth::attempt($cre, $remember)) {
            if ($remember) {
                setcookie("email", $request->get('email', ''), time() + 3600);
                setcookie("password", $request->get('password', ''), time() + 3600);
            } else {
                setcookie('email', '');
                setcookie('password', '');
            }
            return redirect()->route('dashboard')->with('success', 'Login successfully !');
        } else {
            return redirect()->route('login')->with('error', 'Login False !');
        }
    }

    public function loginApi(LoginRequest $request)
    {
        $user = User::where('email', $request->get('email'))->first();
        if ($user && Hash::check($request->get('password'), $user->password)) {
            $token = $user->createToken('token')->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
                'user' => $user
            ], 200);
        }

        return response()->json([
            'error' => 'Unauthorised'
        ], 401);
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
