<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Friend;
use App\Models\User;
use App\Events\FriendRequested;
use Illuminate\Support\Carbon;

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
     * Get friends Id list of a user.
     *
     * @param App\Models\User $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getFriendIds($user)
    {
        return $user->friends()->pluck('friend_id');
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
     * @param  \Illuminate\Database\Eloquent\Builder $data
     * @return Boolean
     */
    public function destroyRequest($data)
    {
        try {
            $data->delete();
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


    /**
     * Get list friend of a user.
     *
     * @param Int $user
     * @param String $date
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getListFriendBirthdays($user, $date)
    {
        $date = new Carbon($date);

        return $user->friends()->whereMonth('birthday', $date->month)
            ->whereDay('birthday', $date->day)
            ->get();
    }

    /**
     * Get search friends data.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSearchFriendList($user, $inputString)
    {
        $friendIds = $this->getFriendIds($user);

        return User::where('id', '!=', $user->id)
            ->whereIn('id', $friendIds)
            ->where('name', 'LIKE', '%' . $inputString . '%')
            ->paginate(config('friend.search'));
    }
}
