<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Carbon;

class UserService
{
    /**
     * Get User data from request.
     *
     * @param  Model  $request
     * @return Array ['name', 'birthday', 'gender', 'introduce']
     */
    public function getUserData($request)
    {
        $birthday = Carbon::createFromFormat('d-m-Y', $request->datetimepicker)->toDateString();

        $request->merge(['birthday' => $birthday]);

        return $request->only([
            'name',
            'birthday',
            'gender',
            'address',
            'introduce'
        ]);
    }

    /**
     * Update user in database.
     *
     * @param Int $id
     * @param Array $data['name', 'birthday', 'gender', 'introduce']
     * @return Boolean
     */
    public function updateUser($id, $data)
    {
        $user = User::findOrFail($id);

        if ($user->id != auth()->id()) {
            return false;
        }

        try {
            $user->update($data);
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Get list not friend database.
     *
     * @param Int $user
     * @return Collection
     */
    public function getListNotFriend($user, $limit = 1)
    {
        $listFriendId = $user->friends->pluck('id')->push($user->id);
        $suggestionFriend = User::whereNotIn('id', $listFriendId)
            ->inRandomOrder()
            ->limit($limit)
            ->get();

        return $suggestionFriend;
    }

    /**
     * Get search people data.
     *
     * @param String $inputString
     * @return \Illuminate\Http\Response
     */
    public function getSearchPeopleList($inputString)
    {
        return User::where('id', '!=', auth()->id())
            ->where('name', 'LIKE', '%' . $inputString . '%')
            ->paginate(config('user.search'));
    }
}
