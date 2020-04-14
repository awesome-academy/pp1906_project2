<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Share;
use Illuminate\Http\Request;

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
        //note: only show posts of this user and friends.
        $userIds = User::pluck('id');
        $posts = Post::with('user')->whereIn('user_id', $userIds)->get();

        $shares = Share::with('user')->whereIn('user_id', $userIds)->get();

        $allPosts = $posts->merge($shares)->sortByDesc('created_at')->forPage($request->page, config('home.page.number'));

        if ($request->ajax()) {
            $nextPosts = view('pages.blocks.post', compact('allPosts'))->render();

            return response()->json([
                'html' => $nextPosts
            ]);
        }

        return view('pages.newsfeed.index', compact('allPosts'));
    }
}
