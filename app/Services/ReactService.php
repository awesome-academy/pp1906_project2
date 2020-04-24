<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\React;
use App\Events\PostReacted;
use App\Models\Post;
use App\Services\NotificationService;

class ReactService
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    /**
     * Store React and Notification in database.
     *
     * @param Array $data['user_id', 'type', 'reactable_id', 'reactable_type']
     * @return Boolean | App\Models\React
     */
    public function storeReact($data)
    {
        $post = Post::findOrFail($data['reactable_id']);

        $notificationData = [
            'sender_id' => $data['user_id'],
            'receiver_id' => $post->user->id,
            'type' => $data['type'],
            'post_id' => $data['reactable_id'],
        ];

        DB::beginTransaction(); //begin transaction

        try {
            React::create($data);
            $this->notificationService->storeNotification($notificationData);

            DB::commit(); //commit transaction

            event(new PostReacted($notificationData['receiver_id']));
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
