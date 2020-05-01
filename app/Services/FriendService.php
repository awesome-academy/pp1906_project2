<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Friend;
use App\Events\FriendRequested;

class FriendService
{
    /**
     * Send Notification Event.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendNotificationEvent($receiverId)
    {
        return event(new FriendRequested($receiverId));
    }

    /**
     * Create new request data in database.
     *
     * @param Array $data
     * @return Boolean
     */
    public function create($data)
    {
        try {
            Friend::create($data);
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Update request data in database.
     *
     * @param App\Models\Friend $relationship
     * @param Int $status
     * @return Boolean
     */
    public function update($relationship, $status)
    {
        try {
            $relationship->update(['status' => $status]);
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Remove friend request.
     *
     * @param  App\Models\Friend $model
     * @return Boolean
     */
    public function destroyRequest($model)
    {
        try {
            $model->delete();
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Get Notifications data.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNotificationById($userId)
    {
        return Friend::where('friend_id', $userId)
            ->orderDesc()
            ->paginate(config('notification.page.number'));
    }
}
