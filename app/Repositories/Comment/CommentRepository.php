<?php 

namespace App\Repositories\Comment;

use App\Models\Comment;

class CommentRepository implements ICommentRepository
{
    protected $comment;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }   
    public function store(array $idea)
    {
        $this->comment->user_id = $idea['user_id'];
        $this->comment->idea_id = $idea['idea_id'];
        $this->comment->comment = $idea['comment'];
        $this->comment->save();
        
    }
}
