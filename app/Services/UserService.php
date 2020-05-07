<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Friend;
use Carbon\Carbon;

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
        $birthday = Carbon::parse($request->datetimepicker)->toDateString();

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

        try {
            $user->update($data);
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
    public function getSearchPeopleList($inputString)
    {
        return User::where('id', '!=', auth()->id())
            ->where('name', 'LIKE', '%' . $inputString . '%')
            ->paginate(config('user.search'));
    }
}
