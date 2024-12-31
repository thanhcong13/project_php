<?php

namespace App\Repositories\Comment;

interface ICommentRepository 
{
    public function show($ideaId);
    public function store(array $idea);
}