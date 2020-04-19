<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Post;
use Illuminate\Support\Str;

class PostService
{
    /**
     * Get Post data from request.
     *
     * @param  Model  $request
     * @return Array ['image', 'content', 'type']
     */
    public function getPostData($request)
    {
        return $request->only([
            'content',
            'image',
            'type'
        ]);
    }

    /**
     * Save Images.
     *
     * @param  Array $images
     * @return JSON
     */
    public function saveImage($images)
    {
        $imageArray = [];
        foreach ($images as $image) {
            $fileName = time() . '_' . $image->getClientOriginalName();

            // Upload image
            $image->storeAs('/posts', $fileName, 'post_images');

            $imageArray[] = $fileName;
        }

        //encode image array to JSON datatype
        $imageString = json_encode($imageArray);

        return $imageString;
    }

    /**
     * Store post in database.
     *
     * @param Array $data['user_id', 'image', 'content', 'type']
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
