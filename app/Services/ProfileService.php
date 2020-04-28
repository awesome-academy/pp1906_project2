<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class ProfileService
{
    /**
     * Save Avatar in database.
     *
     * @param Array $data['avatar']
     * @return String | App\Models\User
     */
    public function saveAvatar($avatar)
    {
        $fileName = time() . '_' . $avatar->getClientOriginalName();

        try {
            $avatar->storeAs('/users', $fileName, 'post_images');

            return $fileName;
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }
    }
}
