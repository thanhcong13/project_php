<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\RegisterService\IRegisterService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    protected $registerService;
    public function __construct(IRegisterService $registerService)
    {
        $this->registerService = $registerService;
    }
    public function index(){
        return view('register');
    }

    // TODO: Neu validate failed thi lay message failed o dau
    public function register(RegisterRequest $request){
        try{
            // dd($request->all());
            $name = $request->get('name');
            $email = $request->get('email');
            $password = $request->get('password');
            $confirm_password = $request->get('confirm-password');
            // $password = bcrypt($request->get('password'));
            // $confirm_password = bcrypt($request->get('confirm-password'));
            // Repository + Model 
            // User::create([
            //     'name' => $name,
            //     'email' => $email,
            //     'password' => $password
            // ]);

            // dd($data);
            $this->registerService->create([
                'name' =>$name,
                'email' => $email,
                'password' => $password,
                'confirm-password' => $confirm_password
            ]);
            return redirect()->route('login')->with('success','Created user successfully !');
        }catch(Exception $e){
            Log::error('Error creating user: ' . $e->getMessage());
            return redirect()->route('register')->with('error','Created user false !');
        }
        
    }
}
