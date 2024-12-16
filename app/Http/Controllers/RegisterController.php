<?php

namespace App\Http\Controllers;

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

    public function register(Request $request){
        request()->validate([
            'name'=>'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirm-password'=> 'required|same:password',
        ]);
       
        try{
            $name = $request->name;
            $email = $request->email;
            $password = $request->password;
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password)
            ]);
            return redirect()->route('login')->with('success','Created user successfully !');
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }
}
