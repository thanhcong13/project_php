<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\RegisterService\RegisterService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $registerService;
    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }
    public function index() {
        return view('member.mem-register');
    }

    public function registerMember(RegisterRequest $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $password = bcrypt($password);
        
        $member = $this->registerService->createMember([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        return redirect()->route('member.login.form');

    }
}
