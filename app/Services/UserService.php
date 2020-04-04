<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\User;

class UserService
{

    /**
     * update in database.
     *
     * @param Array $data['language', 'name', 'birthday', 'gender', ...]
     * @return Boolean
     */
    public function update($id, $data)
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
}
