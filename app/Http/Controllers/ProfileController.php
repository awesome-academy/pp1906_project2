<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Friend;
use App\Services\ProfileService;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    /**
     * Display others user profile.
     *
     * @param Illuminate\Http\Request $request
     * @param string $username
     * @return \Illuminate\Http\Response
     */
    public function showProfile(Request $request, $username)
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

    /**
     * Display user's friends page.
     *
     * @param Illuminate\Http\Request $request
     * @param string $username
     * @return \Illuminate\Http\Response
     */
    public function showFriends(Request $request, $username)
    {
        $currentUser = auth()->user();
        $user = User::with('friends')->where('username', $username)->firstOrFail();

        $relationship = $currentUser->isFriends($user)->first();

        return view('pages.profile.friends.index', compact('user', 'relationship'));
    }

    public function updateAvatar(ProfileRequest $request)
    {
        $user = auth()->user();
        $data = $request->only([
            'avatar',
        ]);

        $avatar = $this->profileService->saveAvatar($data['avatar']);

        try {
            $user->update(['avatar' => $avatar]);
        } catch (\Throwable $th) {
            Log::error($th);

            return back()->with('error', __('profile.avatar.error'));
        }

        return back()->with('success', __('profile.avatar.success'));
    }
}
