<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\PostService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $suggestUsers = User::where('id', '!=', auth()->id())->inRandomOrder()->limit(config('user.suggestion_friend'))->get();

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
