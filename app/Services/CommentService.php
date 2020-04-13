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

    /**
     * Update comment in database.
     *
     * @param Int $id
     * @param Array $data['user_id', 'content']
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

        return $comment;
    }

    /**
     * Delete comment.
     *
     * @param  Int $id
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
