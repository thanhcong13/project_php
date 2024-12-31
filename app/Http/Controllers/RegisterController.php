<?php

namespace App\Http\Controllers;


use App\Models\User;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


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
        

    public function verifyFrom(User $user){
        return view('emails.verify_form', compact('user'));
    }

    public function sendOtp(Request $request)
    {
        try {
            $otp = $request->input('otp');
            $email = $request->input('email');
            $user = User::where('email', $email)->first();
            if(!$user) {
                return redirect()->route('verify.form', ['user' => $user->id])->with('error', 'User not found.');
            }
            if($user->otp !== $otp) {
                return redirect()->route('verify.form', ['user' => $user->id])->with('error', 'Invalid OTP.');
            }
            if (now()->greaterThan($user->otp_expiry_at)) {
                return redirect()->route('verify.form', ['user' => $user->id])->with('error', 'OTP has expired.');
            }
            $user->otp = null;
            $user->otp_expiry_at = null;
            $user->email_verified_at = now();
            $user->save();
            return redirect()->route('login')->with('success', 'Created user successfully !');
        } catch (Exception $e) {
            Log::error('Error creating user: ' . $e->getMessage());
            return redirect()->route('register')->with('error', 'Created user false !');
        }

    }
    public function register(RegisterRequest $request)
    {
        try {
            $name = $request->get('name');
            $email = $request->get('email');
            $password = $request->get('password');
            $password = bcrypt($request->get('password'));
            
            $user = $this->registerService->create(
                [
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                ]
            );

            $otp = rand(100000,999999);
            $user->otp = $otp;
            $user->otp_expiry_at = now()->addMinutes(5);
            $user->save();
            Mail::to($user->email)->send(new OptVerificationMail($otp));
            
            return redirect()->route('verify.form' , ['user' => $user->id]);
        } catch (Exception $e) {
            Log::error('Error creating user: ' . $e->getMessage());
            return redirect()->route('register')->with('error', 'Created user false !');
        }

    }
}
