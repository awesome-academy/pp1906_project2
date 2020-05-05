<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\PostService;
use App\Models\Notification;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Store post in database.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $this->postService->getPostData($request);

        $data['user_id'] = auth()->id();

        if (isset($data['image'])) {
            $data['image'] = $this->postService->saveImage($data['image']);
        }

        $storePost = $this->postService->storePost($data);

        if ($storePost) {
            return back()->with('success', __('post.create.success'));
        }

        return back()->with('error', __('post.error'));
    }

    /**
     * Update post in database.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $data = $this->postService->getPostData($request);

        $data['user_id'] = auth()->id();

        $updatePost = $this->postService->updatePost($id, $data);

        if ($updatePost) {
            return back()->with('success', __('post.update.success'));
        }

        return back()->with('error', __('post.error'));
    }

    /**
     * Display the single post and mark notification is read if it has.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        $notification = Notification::where(['post_id' => $id], ['receiver_id' => auth()->id()])->first();

        if ($notification && !$notification->isRead()) {
            $this->postService->setPostNotificationIsRead($notification);
        }

        return view('pages.post.index', compact('post'));
    }

    /**
     * Remove post in database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletePost = $this->postService->deletePost($id);

        if ($deletePost) {
            return back()->with('success', __('post.delete.success'));
        }

        return back()->with('success', __('post.error'));
    }

    /**
     * Share a post.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @param Int $id
     * @return \Illuminate\Http\Response
     */
    public function share(PostRequest $request, $id)
    {
        $data = $this->postService->getPostData($request);

        $data['user_id'] = auth()->id();

        $storePost = $this->postService->sharePost($data, $id);

        if ($storePost) {
            return back()->with('success', __('share.create.success'));
        }

        return back()->with('error', __('share.error'));
    }
}
