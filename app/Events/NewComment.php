<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Comment; // Import your Comment model

class NewComment implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $comment;


    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
    public function broadcastOn()
    {
        return new Channel('comments');
    }
    public function broadcastAs()
    {
        return 'new-comment';
    }
    public function broadcastWith()
    {
        return [
            'id' => $this->comment->id,
            'idea_id' => $this->comment->idea_id,
            'comment' => $this->comment->comment,
            'user' => $this->comment->user,
            'created_at' => $this->comment->created_at->format('Y-m-d H:i:s'),

        ];
    }
}
