<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\PostService;

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
     * Display the single post.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

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
}
