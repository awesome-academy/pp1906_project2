<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Comment;

class CommentService
{
    /**
     * Store Comment in database.
     *
     * @param Array $data['user_id', 'content', 'post_id']
     * @return Boolean | App\Models\Comment
     */
    public function storeComment($data)
    {
        try {
            $comment = Comment::create($data);
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return $comment;
    }
}
