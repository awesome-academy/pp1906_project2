<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Comment;
use App\Services\ActivityService;
use App\Services\NotificationService;

class CommentService
{
    protected $activityService;

    public function __construct(ActivityService $activityService, NotificationService $notificationService)
    {
        $this->activityService = $activityService;
        $this->notificationService = $notificationService;
    }

    /**
     * Store Comment in database.
     *
     * @param Array $data['user_id', 'content', 'post_id']
     * @return Boolean | App\Models\Comment
     */
    public function storeComment($data)
    {
        $senderId = $data['user_id'];

        $post = Post::findOrFail($data['post_id']);

        $receiverId = $post->user->id;

        $activityData = [
            'user_id' => $senderId,
            'post_id' => $data['post_id'],
        ];

        $activityData['type'] = config('activity.type.comment');

        $notificationData = [
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'post_id' => $data['post_id'],
        ];

        DB::beginTransaction();

        try {
            $comment = Comment::create($data);

            if (is_null($comment['parent_id'])) {
                $notificationData['type'] = config('notification.type.comment');
            } else {
                $parentComment = Comment::findOrFail($comment['parent_id']);

                if (is_null($parentComment->parent_id)) {
                    $notificationData['type'] = config('notification.type.reply');
                } else {
                    $notificationData['type'] = config('notification.type.replies_of_reply');
                }

                $notificationData['receiver_id'] = $parentComment->user_id;
            }

            if ($senderId != $receiverId) {
                $this->notificationService->storeNotification($notificationData);
                $this->activityService->storeActivity($activityData);
            }

            DB::commit();
        } catch (\Throwable $th) {
            Log::error($th);

            DB::rollBack();

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

        if ($comment->user_id != auth()->id()) {
            return false;
        }

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

        if ($comment->user_id != auth()->id()) {
            return false;
        }

        try {
            $comment->delete();
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }
}
