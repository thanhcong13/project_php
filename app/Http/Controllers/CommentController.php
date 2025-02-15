<?php

namespace App\Http\Controllers;


use App\Http\Requests\CommentRequest;
use App\Jobs\SaveCommentJob;
use App\Models\Comment;
use App\Models\Idea;
use App\Services\Comment\ICommentService;
use Exception;
use Illuminate\Http\Request;


class CommentController extends Controller
{

    protected $commentService;
    public function __construct(ICommentService $commentService)
    {
        $this->commentService = $commentService;
    }
    public function show($idea_id) {
        $comments = $this->commentService->show($idea_id);
        return view('shared.comment' , compact('$comments'));
    }
    public function store(Idea $idea)
    {
        $user_id = auth()->user()->id;
        $idea_id = $idea->id;
        $comment = request()->get('comment');
        
        $this->commentService->store(
            [
                'user_id' => $user_id,
                'idea_id' => $idea_id,
                'comment' => $comment
            ]
            );

        return redirect()->route('dashboard' , $idea->id)->with('success', 'Comment successfully.');

    }
    public function storeApi(CommentRequest $request)
    {
        try {
            $user_id = $request->get('user_id');
            $idea_id = $request->get('idea_id');
            $comment = $request->get('comment');
            
            $res = $this->commentService->storeApi(
                [
                    'user_id' => $user_id,
                    'idea_id' => $idea_id,
                    'comment' => $comment
                ]
                );
    
           return $res;
        } catch(Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }

    }
    public function createCommentRealTime(CommentRequest $request)
    {
        try {
            $user_id = $request->get('user_id');
            $idea_id = $request->get('idea_id');
            $comment = $request->get('comment');
            
            SaveCommentJob::dispatch([
                'user_id' => $user_id,
                'idea_id' => $idea_id,
                'comment' => $comment
            ]);
            return response()->json(['message' => 'Created comment successfully ! ']);
        } catch(Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }

    }


}
