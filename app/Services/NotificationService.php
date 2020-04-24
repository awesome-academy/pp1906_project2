<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Notification;

class NotificationService
{
    protected $model;

    public function __construct(Notification $notificationModel)
    {
        $this->model = $notificationModel;
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
        return Notification::where('receiver_id', $userId)->isNotRead()->count();
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
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }
}
