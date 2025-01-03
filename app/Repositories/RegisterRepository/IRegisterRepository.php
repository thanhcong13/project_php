<?php
namespace App\Repositories\RegisterRepository;

interface IRegisterRepository
{
    public function create(array $data);
    public function createMember(array $data);
}

?>