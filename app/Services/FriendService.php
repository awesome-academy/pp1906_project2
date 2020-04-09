<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Friend;

class FriendService
{
    /**
     * Update or Create new request data in database.
     *
     * @param Array $data
     * @return Boolean
     */
    public function updateOrCreate($data)
    {
        try {
            Friend::updateOrCreate($data);
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }
}
