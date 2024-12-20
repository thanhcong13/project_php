<?php

namespace App\Services\Comment;

interface ICommentService 
{
    public function store(array $idea);
    public function storeApi(array $idea);
}