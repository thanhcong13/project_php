<?php

namespace App\Services\RegisterService;

use App\Http\Requests\RegisterRequest;
use App\Repositories\RegisterRepository\IRegisterRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class RegisterService implements IRegisterService
{
    protected $registerRepository;
    public function __construct(IRegisterRepository $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }
    public function create(array $data)
    {
        return $this->registerRepository->create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password']
            ]
        );
    }
    public function createMember(array $data)
    {
        return $this->registerRepository->createMember(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password']
            ]
        );
    }

}


?>