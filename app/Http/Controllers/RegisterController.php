<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    // TODO: Neu validate failed thi lay message failed o dau
    public function register(RegisterRequest $request){
        try{
            // dd($request->all());
            $name = $request->get('name');
            $email = $request->get('email');
            $password = bcrypt($request->get('password'));
            
            // Repository + Model 
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => $password
            ]);
            return redirect()->route('login')->with('success','Created user successfully !');
        }catch(Exception $e){
            
            return redirect()->route('register')->with('error','Created user false !');
        }
        
    }
}
