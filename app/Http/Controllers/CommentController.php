<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\ReactRequest;
use App\Http\Requests\ReplyRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Services\CommentService;
use App\Services\ReactService;

class CommentController extends Controller
{
    protected $commentService;
    protected $reactService;

    public function __construct(CommentService $commentService, ReactService $reactService)
    {
        $this->commentService = $commentService;
        $this->reactService = $reactService;
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
        $post = Post::findOrFail($data['post_id']);

        if ($comment) {
            return response()->json([
                'status' => true,
                'comment' => view('pages.blocks.comment', compact('comment', 'postId', 'post'))->render(),
                'count_comments' => $post->parentComments()->count(),
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

    /**
     * Remove comment in database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = $this->commentService->deleteComment($id);

        if ($comment) {
            return response()->json([
                'status' => true,
            ]);
        }

        return response()->json([
            'status' => false,
        ]);
    }

    /**
     * Store React in database.
     *
     * @param  \Illuminate\Http\ReactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function reactComment(ReactRequest $request)
    {
        $data = $request->only([
            'type',
            'reactable_id',
        ]);

        $comment = Comment::findOrFail($data['reactable_id']);
        $data['reactable_type'] = 'App\Models\Comment';
        $data['user_id'] = auth()->id();

        $react = $this->reactService->updateReact($data);

        if ($react) {
            return response()->json([
                'status' => true,
                'count_react' => $comment->reacts->count(),
                'view' => view('pages.blocks.modals.react_user_comment', compact('comment'))->render(),
            ]);
        }

        return response()->json([
            'status' => false,
        ]);
    }

    /**
     * View More Comment in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function viewMoreComment(Request $request)
    {
        $postId = $request->post_id;

        $post = Post::findOrFail($postId);

        if ($post) {
            $comments = $post->parentComments()->orderBy('created_at', 'desc')->paginate(config('post.comment.paginate'));

            $moreComments = $comments->sortBy('created_at');

            $html = '';

            if ($moreComments->count() > 0) {
                $html = view('pages.blocks.list_comment', compact('post', 'moreComments'))->render();
            }

            return response()->json([
                'status' => true,
                'html' => $html,
            ]);
        }

        return response()->json([
            'status' => false,
        ]);
    }

    /**
     * Store Reply of a Comment in database.
     *
     * @param  \Illuminate\Http\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function replyComment(ReplyRequest $request)
    {
        $data = $request->only([
            'post_id',
            'parent_id',
            'content',
        ]);

        $data['user_id'] = auth()->id();

        $comment = $this->commentService->storeComment($data);

        $postId = $data['post_id'];

        if ($comment) {
            return response()->json([
                'status' => true,
                'reply' => view('pages.blocks.widgets.single_comment_reply', compact('comment', 'postId'))->render()
            ]);
        }

        return response()->json([
            'status' => false,
        ]);
    }
}
