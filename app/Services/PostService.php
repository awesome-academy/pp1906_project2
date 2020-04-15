<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Post;

class PostService
{
    /**
     * Get Post data from request.
     *
     * @param  Model  $request
     * @return Array ['content', 'type']
     */
    public function getPostData($request)
    {
        return $request->only([
            'content',
            'type'
        ]);
    }

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

    /**
     * Update post in database.
     *
     * @param Int $id
     * @param Array $data['user_id', 'content', 'type']
     * @return Boolean
     */
    public function updatePost($id, $data)
    {
        $post = Post::findOrFail($id);

        try {
            $post->update($data);
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Share post in database.
     *
     * @param Array $data['user_id', 'content', 'type']
     * @param Int $id
     * @return Boolean
     */
    public function sharePost($data, $id)
    {
        $post = Post::findOrFail($id);
        $sharePostId = $post->share_from_post_id;

        try {
            if (is_null($sharePostId)) {
                $data['share_from_post_id'] = $id;
            } else {
                $data['share_from_post_id'] = $sharePostId;
            }

            Post::create($data);
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }

    /**
     * Delete Post.
     *
     * @param  int $id
     * @return Boolean
     */
    public function deletePost($id)
    {
        $post = Post::findOrFail($id);

        try {
            $post->delete();
        } catch (\Throwable $th) {
            Log::error($th);

            return false;
        }

        return true;
    }
}
