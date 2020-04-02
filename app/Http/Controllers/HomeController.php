<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;

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
    public function index()
    {
        $users = User::pluck('id');
        $posts = Post::with('user')->whereIn('user_id', $users)->orderBy('updated_at', 'desc')->get();
        //note: only show posts of this user and friends.

        return view('pages.newsfeed.index', compact('posts'));
    }
}
