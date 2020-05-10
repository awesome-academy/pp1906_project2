<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Post;
use App\Models\Comment;
use App\Services\ActivityService;

class CommentService
{
    protected $activityService;

    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }

    /**
     * Store Comment in database.
     *
     * @param Array $data['user_id', 'content', 'post_id']
     * @return Boolean | App\Models\Comment
     */
    public function storeComment($data)
    {
        $activityData = [
            'user_id' => $data['user_id'],
            'post_id' => $data['post_id'],
        ];

        $activityData['type'] = config('activity.type.comment');

        try {
            $comment = Comment::create($data);

            $this->activityService->storeActivity($activityData);
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
