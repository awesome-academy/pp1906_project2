<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Notification;
use App\Events\PostReacted;

class NotificationService
{
    protected $model;

    public function __construct(Notification $notificationModel)
    {
        $this->model = $notificationModel;
    }

    /**
     * Send Notification Event.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendNotificationEvent($notificationData)
    {
        if ($notificationData['sender_id'] != $notificationData['receiver_id']) {
            return event(new PostReacted($notificationData['receiver_id']));
        }
    }

    /**
     * Get Notifications data.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNotificationById($userId)
    {
        return $this->model->where('receiver_id', $userId)
            ->orderDesc()
            ->paginate(config('notification.page.number'));
    }

    /**
     * Get Notifications count.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNotificationCount($userId)
    {
        return Notification::where('receiver_id', $userId)
            ->isNotRead()
            ->count();
    }

    /**
     * Get all unread notifications with post of current user.
     *
     * @param  Int $userId
     * @param Int $postId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getUnReadNotifications($userId, $postId)
    {
        return Notification::where(['post_id' => $postId, 'receiver_id' => $userId, 'is_read' => config('notification.is_not_read')]);
    }

    /**
     * Mark all notification as read.
     *
     * @return Boolean
     */
    public function markAllAsRead($userId)
    {
        try {
            Notification::where('receiver_id', $userId)->update(['is_read' => true]);
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }


    /**
     * Store Notification in database.
     *
     * @param Array $data['sender_id', 'receiver_id', 'type', 'post_id']
     * @return Boolean
     */
    public function storeNotification($data)
    {
        try {
            Notification::create($data);

            $this->sendNotificationEvent($data);
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * set Notification of post is read.
     *
     * @param Int $postId
     * @return Boolean
     */
    public function setPostNotificationsIsRead($postId)
    {
        $notifications = $this->getUnReadNotifications(auth()->id(), $postId);

        if ($notifications->count() > 0) {
            try {
                $notifications->update(['is_read' => true]);
            } catch (\Throwable $th) {
                Log::error($th);

                return false;
            }
        }
    }
}
