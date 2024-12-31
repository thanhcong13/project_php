<?php 

namespace App\Repositories\Like;

use App\Models\Idea;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeRepository implements ILikeRepository
{
    public function createLike($userId, $ideaId)
    {
        return Like::create([
            'user_id' => $userId,
            'idea_id' => $ideaId,
        ]);
    }
    public function findLikeByUserAndIdea($id)
    {
        $idea = Idea::find($id);
        $like = Like::where('user_id', Auth::user()->id)->where('idea_id', $idea->id)->first();
        return $like;
    }
    public function deleteLike($like)
    {
        return $like->delete();
    }
}