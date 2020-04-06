<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Comment;

class CommentService
{
    /**
     * Store comment in database.
     *
     * @param Array $data['user_id', 'content', 'comment_id']
     * @return Boolean
     */
    public function storeComment($data)
    {
        try {
            Comment::create($data);
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Update comment in database.
     *
     * @param Int $id
     * @param Array $data['user_id', 'content', 'type']
     * @return Boolean
     */
    public function updateComment($id, $data)
    {
        $comment = Comment::findOrFail($id);

        try {
            $comment->update($data);
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Delete comment.
     *
     * @param  int $id
     * @return Boolean
     */
    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);

        try {
            $comment->delete();
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }
}
