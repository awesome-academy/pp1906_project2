<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Activity;

class ActivityService
{
    /**
     * Store Activity in database.
     *
     * @param Array $data['user_id', 'post_id', 'status']
     * @return Boolean
     */
    public function storeActivity($data)
    {
        $activityExists = Activity::where($data)->exists();

        if ($activityExists) {
            return true;
        }

        try {
            Activity::create($data);
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }


    /**
     * Get list activities for showing in newsfeed.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListActivities($user)
    {
        $userFriendIds = $user->friends()
            ->where('friends.status', config('friend.status.accept'))
            ->pluck('friend_id');

        return Activity::with('user')
            ->whereIn('user_id', $userFriendIds)
            ->orderDesc()
            ->paginate(config('activity.page'));
    }
}
