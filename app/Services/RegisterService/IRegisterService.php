<?php
namespace App\Services\RegisterService;

interface IRegisterService 
{
    public function create(array $data);
    public function createMember(array $data);
}

?>