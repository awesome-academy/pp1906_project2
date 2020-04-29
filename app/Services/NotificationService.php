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
        $notificationExists = Notification::where([
            'sender_id' => $data['sender_id'],
            'receiver_id' => $data['receiver_id'],
            'type' => $data['type'],
            'post_id' => $data['post_id']
        ])->exists();

        try {
            if ($notificationExists) {
                return true;
            }

            Notification::create($data);

            $this->sendNotificationEvent($data);
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }
}
