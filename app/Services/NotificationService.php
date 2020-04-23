<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Notification;

class NotificationService
{
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
