<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Services\CommentService;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * Store Comment in database.
     *
     * @param  \Illuminate\Http\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $data = $request->only([
            'post_id',
            'content',
        ]);

        $data['user_id'] = auth()->id();

        $comment = $this->commentService->storeComment($data);
        $postId = $data['post_id'];

        if ($comment) {
            return response()->json([
                'status' => true,
                'comment' => view('pages.blocks.comment', compact('comment', 'postId'))->render(),
            ]);
        }

        return response()->json([
            'status' => false,
        ]);
    }

    /**
     * Update comment in database.
     *
     * @param  \Illuminate\Http\CommentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, $id)
    {
        $data = $request->only([
            'post_id',
            'content',
        ]);

        $data['user_id'] = auth()->id();

        $comment = $this->commentService->updateComment($id, $data);
        $postId = $data['post_id'];

        if ($comment) {
            return response()->json([
                'status' => true,
                'comment' => view('pages.blocks.comment', ['comment' => $comment, 'postId' => $postId])->render(),
            ]);
        }

        return response()->json([
            'status' => false,
        ]);
    }
}
