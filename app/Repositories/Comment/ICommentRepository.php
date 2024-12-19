<?php

namespace App\Repositories\Comment;

interface ICommentRepository 
{
    public function store(array $idea);
}