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
    public function store(array $idea)
    {
        $user_id = $idea['user_id'];
        $idea_id = $idea['idea_id'];
        $comment = $idea['comment'];

        request()->validate([
            'comment' => 'required'
        ]);

        $this->commentRepository->store(
        [
            'user_id' => $user_id,
            'idea_id' => $idea_id,
            'comment' => $comment
        ]);
        
    }
}