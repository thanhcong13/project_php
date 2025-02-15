<?php

namespace App\Repositories\RegisterRepository;

use App\Models\Member;
use App\Models\User;

class RegisterRepository implements IRegisterRepository
{
    public function create(array $data)
    {
        return User::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password']
            ]
        );
    }
    public function createMember(array $data)
    {
        return Member::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password']
            ]
        );
    }
}
