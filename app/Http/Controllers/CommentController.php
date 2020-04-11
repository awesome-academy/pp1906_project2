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

        if ($comment) {
            return response()->json([
                'status' => true,
                'comment' => view('pages.blocks.comment', compact('comment'))->render(),
            ]);
        }

        return response()->json([
            'status' => false,
        ]);
    }
}
