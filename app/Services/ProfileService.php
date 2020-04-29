<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class ProfileService
{
    /**
     * Upload Image in database.
     *
     * @param Array $data['avatar', 'cover']
     * @return String | App\Models\User
     */
    public function uploadImage($image)
    {
        try {
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('/users', $fileName, 'post_images');

            return $fileName;
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }
    }
}
