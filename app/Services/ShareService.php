<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Share;

class ShareService
{
    /**
     * Get Share data from request.
     *
     * @param  App\Models  $request
     * @return Array [content', 'type']
     */
    public function getShareData($request)
    {
        return $request->only([
            'content',
            'type'
        ]);
    }

    /**
     * Store post in database.
     *
     * @param Array $data['user_id', 'post_id', 'content', 'type']
     * @return Boolean
     */
    public function store($data)
    {
        try {
            Share::create($data);
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }
}
