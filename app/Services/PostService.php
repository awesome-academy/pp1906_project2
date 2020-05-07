<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Services\NotificationService;

class PostService
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

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

        $notificationData = [
            'sender_id' => $data['user_id'],
            'receiver_id' => $post->user->id,
            'type' => config('notification.type.share'),
        ];

        DB::beginTransaction();

        try {
            if (is_null($sharePostId)) {
                $data['share_from_post_id'] = $id;
            } else {
                $data['share_from_post_id'] = $sharePostId;
            }

            $sharePost = Post::create($data);

            if ($data['user_id'] != $post->user->id) {
                $notificationData['post_id'] = $sharePost->id;
                $this->notificationService->storeNotification($notificationData);
            }

            DB::commit();
        } catch (\Throwable $th) {
            Log::error($th);

            DB::rollBack();

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

    /**
     * Get list posts for showing in newsfeed.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListPosts($user, $isCurrentUser = true)
    {
        $userFriendIds = $user->friends->pluck('id');

        if ($isCurrentUser) {
            $listUserIds = $userFriendIds->push($user->id);
        } else {
            $listUserIds = [$user->id];
        }

        return Post::with('user', 'parentComments')
            ->whereIn('user_id', $listUserIds)
            ->orderDesc()
            ->paginate(config('home.page.number'));
    }
}
