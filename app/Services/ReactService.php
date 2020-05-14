<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\React;
use App\Events\PostReacted;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Activity;
use App\Services\NotificationService;
use App\Services\ActivityService;

class ReactService
{
    protected $notificationService;
    protected $activityService;

    public function __construct(NotificationService $notificationService, ActivityService $activityService)
    {
        $this->notificationService = $notificationService;
        $this->activityService = $activityService;
    }

    /**
     * Store React and Notification in database.
     *
     * @param Array $data['user_id', 'type', 'reactable_id', 'reactable_type']
     * @return Boolean | App\Models\React
     */
    public function storeReact($data)
    {
        $senderId = $data['user_id'];

        if ($data['reactable_type'] == 'App\Models\Comment') {
            $comment = Comment::findOrFail($data['reactable_id']);
            $receiverId = $comment->user->id;
            $postId = $comment->post->id;
            $commentId = $comment->id;
        } else {
            $post = Post::findOrFail($data['reactable_id']);
            $receiverId = $post->user->id;
            $postId = $post->id;

            $activityData = [
                'user_id' => $senderId,
                'post_id' => $data['reactable_id'],
                'type' => $data['type']
            ];
        }

        $notificationData = [
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'type' => $data['type'],
            'post_id' => $postId,
            'comment_id' => $commentId ?? null,
        ];

        DB::beginTransaction(); //begin transaction

        try {
            React::create($data);

            if ($senderId != $receiverId) {
                $this->notificationService->storeNotification($notificationData);

                if (isset($activityData)) {
                    $this->activityService->storeActivity($activityData);
                }
            }

            DB::commit(); //commit transaction
        } catch (\Throwable $th) {
            Log::error($th);

            DB::rollBack(); //rollback transaction

            return false;
        }

        return true;
    }

    /**
     * Find a record by condition in database.
     *
     * @param Array $data['user_id', 'type', 'reactable_id', 'reactable_type']
     * @return null | App\Models\React
     */
    public function findCondition($data)
    {
        $reactData = React::where($data)->first();

        return $reactData;
    }

    /**
     * Update react in database.
     *
     * @param Int $id
     *  @param Array $data['user_id', 'type', 'reactable_id', 'reactable_type']
     * @return Boolean
     */
    public function updateReact($data)
    {
        $reactRecord = $this->findCondition($data);

        if (!$reactRecord) {
            return $this->storeReact($data);
        } else {
            try {
                $reactRecord->delete($data);
            } catch (\Throwable $th) {
                Log::error($th);

                return false;
            }

            return true;
        }
    }
}
