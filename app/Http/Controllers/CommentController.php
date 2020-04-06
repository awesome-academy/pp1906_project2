<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Services\CommentService;
use App\Models\Comment;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * Store comment in database.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $data =  $request->only([
            'content',
            'post_id',
        ]);

        $currentUserId = auth()->id();

        $commentData = [
            'user_id' => $currentUserId,
            'post_id' => $data['post_id'],
            'content' => $data['content'],
            'parent_id' => 1,
        ];
        $storeComment = $this->commentService->storeComment($commentData);

        if ($storeComment) {
            return back()->with('success', __('post.create.success'));
        }

        return back()->with('error', __('post.error'));
    }

    public function update(CommentRequest $request, $id)
    {
        $data = $request->only([
            'content',
            'post_id',
        ]);

        $currentUserId = auth()->id();
        $comment = Comment::findOrFail($id);
        $updateComment = $this->commentService->updateComment($id, $data);

        if ($updateComment) {
            return back()->with('success', __('post.update.success'));
        }

        return back()->with('error', __('post.error'));
    }

    public function destroy($id)
    {
        $deleteComment = $this->commentService->deleteComment($id);

        if ($deleteComment) {
            return back()->with('success', __('post.delete.success'));
        }

        return back()->with('success', __('post.error'));
    }
}
