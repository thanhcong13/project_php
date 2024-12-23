<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Like;
use App\Services\Like\ILikeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    protected $likeService;

    public function __construct(ILikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function unLike($id)
    {
        try {
            $result = $this->likeService->unLike($id);

            if (!$result) {
                return redirect()->route('ideas.idea.like');
            }

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function like(Idea $idea)
    {
        $user = Auth::user();

        $result = $this->likeService->like($idea, $user);

        if (!$result) {
            return redirect()->route('ideas.idea.unlike');
        }

        return redirect()->back();
    }
    

}
