<?php

namespace App\Services\Like;

interface ILikeService 
{
    public function like($idea, $user);
    public function unlike($id);
}