<?php 

namespace App\Repositories\Comment;

use App\Models\Comment;
use App\Models\Idea;

class CommentRepository implements ICommentRepository
{
    protected $comment;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }   
    public function store(array $idea)
    {
        $this->comment->create([
            'user_id' => $idea['user_id'],
            'idea_id' => $idea['idea_id'],
            'comment' => $idea['comment'],
        ]);
        
    }
    public function show($ideaId) {
        $query = Comment::where('idea_id' , $ideaId);
        $comment = $query->orderBy('created' , 'DESC')->paginate(config('pagination.comment_page'));
        return $comment;
    }

}
