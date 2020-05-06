<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $suggestUsers = User::where('id', '!=', auth()->id())->inRandomOrder()->limit(config('user.suggestion_friend'))->get();

        $userIds = User::pluck('id');

        $posts = Post::with('user', 'comments')
            ->whereIn('user_id', $userIds)
            ->orderDesc()
            ->paginate(config('home.page.number'));
        //note: only show posts of this user and friends.

        if ($request->ajax()) {
            $nextPosts = view('pages.blocks.post', compact('posts'))->render();

            return response()->json([
                'html' => $nextPosts
            ]);
        }

        return view('pages.newsfeed.index', compact('posts', 'suggestUsers'));
    }
}
