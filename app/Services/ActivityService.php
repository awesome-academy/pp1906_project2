<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Activity;
use App\Services\FriendService;

class ActivityService
{
    protected $friendService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FriendService $friendService)
    {
        $this->friendService = $friendService;
    }

    /**
     * Store Activity in database.
     *
     * @param Array $data['user_id', 'post_id', 'status']
     * @return Boolean
     */
    public function storeActivity($data)
    {
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
     * @param App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function getListActivities($user)
    {
        $userFriendIds = $this->friendService->getFriendIds($user);

        return Activity::with('user')
            ->whereIn('user_id', $userFriendIds)
            ->orderDesc()
            ->paginate(config('activity.page'));
    }

    /**
     * Get latest activities for showing in newsfeed.
     *
     * @param App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function getLatestActivities($user)
    {
        $userFriendIds = $this->friendService->getFriendIds($user);

        return Activity::with('user')
            ->whereIn('user_id', $userFriendIds)
            ->whereBetween('created_at', [now()->subMinutes(config('activity.minutes_between')), now()])
            ->limit(10)
            ->orderDesc()
            ->get();
    }

    /**
     * Delete Activity.
     *
     * @param  int $postId
     * @return Boolean
     */
    public function deleteActivity($postId)
    {
        $activity = Activity::where('post_id', $postId);

        try {
            $activity->delete();
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }
}
