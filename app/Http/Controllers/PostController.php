<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Services\NotificationService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService, NotificationService $notificationService)
    {
        $this->postService = $postService;
        $this->notificationService = $notificationService;
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

        if (isset($data['image'])) {
            $data['image'] = $this->postService->saveImage($data['image']);
        }

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

        $this->notificationService->setPostNotificationsIsRead($id);

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

    /**
     * Get latest posts to show on newsfeed.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLatestPost()
    {
        $newPostCounts = $this->postService->getLatestPostsCount(auth()->user());;

        $html = '';

        if ($newPostCounts > 0) {
            $posts = $this->postService->getListPosts(auth()->user());

            $html = view('pages.blocks.post', compact('posts'))->render();
        }

        return response()->json([
            'status' => true,
            'html' => $html,
            'count' => $newPostCounts,
        ]);
    }

    /**
     * Get post's images.
     *
     * @param Int $postId
     * @return \Illuminate\Http\Response
     */
    public function getPostImages($postId)
    {
        $post = Post::findOrFail($postId);

        $postImages = json_decode($post->image);

        $html = '';

        if ($postImages) {
            $html = view('pages.blocks.modals.edit_image_block', compact('postImages', 'post'))->render();
        }

        return response()->json([
            'html' => $html
        ]);
    }
}
