<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
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
        $data = $request->only([
            'content',
            'type'
        ]);

        $data['user_id'] = auth()->id();

        $storePost = $this->postService->storePost($data);

        if ($storePost) {
            return back()->with('success', 'Your status post has been created!');
        }

        return back()->with('error', 'Create status post failed!');
    }
}
