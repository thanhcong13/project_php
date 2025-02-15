<?php

namespace App\Services\Comment;

use App\Repositories\Comment\ICommentRepository;

class CommentService implements ICommentService
{
    protected $commentRepository;
    public function __construct(ICommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }
    public function show($ideaId) {
        return $this->commentRepository->show($ideaId);
    }
    public function store(array $idea)
    {
        $user_id = $idea['user_id'];
        $idea_id = $idea['idea_id'];
        $comment = $idea['comment'];

        $this->commentRepository->store(
            [
                'user_id' => $user_id,
                'idea_id' => $idea_id,
                'comment' => $comment
            ]
        );
    }
    public function storeApi(array $idea)
    {
        try {
            $user_id = $idea['user_id'];
            $idea_id = $idea['idea_id'];
            $comment = $idea['comment'];

            $data = $this->commentRepository->store(
                [
                    'user_id' => $user_id,
                    'idea_id' => $idea_id,
                    'comment' => $comment
                ]
            );
            return response()->json([
                'message' => 'comment successfuly.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
