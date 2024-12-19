<?php

namespace App\Repositories\Like;

interface ILikeRepository 
{
    public function createLike($userId, $ideaId);
    public function findLikeByUserAndIdea($id);
    public function deleteLike($like);
}