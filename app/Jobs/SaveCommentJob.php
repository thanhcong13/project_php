<?php

namespace App\Jobs;

use App\Events\NewComment;
use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SaveCommentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $commentData;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $commentData)
    {
        $this->commentData = $commentData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $comment = Comment::create($this->commentData);
        
        broadcast(new NewComment($comment));
    }
}
