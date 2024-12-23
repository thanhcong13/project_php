<?php

namespace App\Services\Like;

use App\Models\Idea;
use App\Repositories\Like\ILikeRepository;
use Illuminate\Support\Facades\Auth;

class LikeService  implements ILikeService
{
    protected $likeRepository;
    public function __construct(ILikeRepository $likeRepository)
    {
        $this->likeRepository = $likeRepository;
    }
    
    public function like($idea, $user)
    {
        if ($idea->isLikedBy($user)) {
            return false; // Hoặc xử lý logic khi người dùng đã thích ý tưởng
        }

        return $this->likeRepository->createLike($user->id, $idea->id);
    }
    public function unlike($ideaId)
    {
        $like = $this->likeRepository->findLikeByUserAndIdea($ideaId);

        if (!$like) {
            return false;
        }

        return $this->likeRepository->deleteLike($like);
    }
}