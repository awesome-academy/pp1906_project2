<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\PostService;
use Illuminate\Http\Request;
use App\Services\UserService;

class HomeController extends Controller
{
    protected $userService;
    protected $postService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService, PostService $postService)
    {
        $this->userService = $userService;
        $this->postService = $postService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $suggestUsers = $this->userService->getListNotFriend(
            auth()->user(),
            config('user.suggestion_friend')
        );

        $posts = $this->postService->getListPosts(auth()->user());

        if ($request->ajax()) {
            $nextPosts = view('pages.blocks.post', compact('posts'))->render();

            return response()->json([
                'html' => $nextPosts
            ]);
        }

        return view('pages.newsfeed.index', compact('posts', 'suggestUsers'));
    }
}
