<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Friend;

class ProfileController extends Controller
{
    /**
     * Display others user profile.
     *
     * @param Illuminate\Http\Request $request
     * @param string $username
     * @return \Illuminate\Http\Response
     */
    public function userProfile(Request $request, $username)
    {
        $currentUser = auth()->user();
        $user = User::with('friends')->where('username', $username)->firstOrFail();

        $relationship = $currentUser->isFriends($user)->first();

        $posts = Post::with('user')
            ->where('user_id', $user->id)
            ->orderDesc()
            ->paginate(config('home.page.number'));
        //note: only show posts of this user and friends.

        if ($request->ajax()) {
            $nextPosts = view('pages.blocks.post', compact('posts'))->render();

            return response()->json([
                'html' => $nextPosts
            ]);
        }

        return view('pages.profile.timeline.index', compact('user', 'posts', 'relationship'));
    }
}
