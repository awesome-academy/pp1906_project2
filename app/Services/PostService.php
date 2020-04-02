<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Post;

class PostService
{

    /**
     * Store post in database.
     *
     * @param Array $data['user_id', 'content', 'type']
     * @return Boolean
     */
    public function storePost($data)
    {
        try {
            Post::create($data);
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }
}
