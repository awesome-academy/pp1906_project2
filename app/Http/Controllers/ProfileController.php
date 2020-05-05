<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Friend;
use App\Services\ProfileService;
use App\Services\PostService;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    protected $profileService;
    protected $postService;

    public function __construct(ProfileService $profileService, PostService $postService)
    {
        $this->profileService = $profileService;
        $this->postService = $postService;
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

        $posts = $this->postService->getListPosts($user, false);

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

    public function uploadProfileImage(ProfileRequest $request)
    {
        $user = auth()->user();
        $data = $request->only([
            'avatar',
            'cover'
        ]);

        if (isset($data['avatar'])) {
            $image = $data['avatar'];
            $updateField = 'avatar';
        } else {
            $image = $data['cover'];
            $updateField = 'cover';
        }

        $saveImage = $this->profileService->uploadImage($image);

        try {
            $user->update([$updateField => $saveImage]);
        } catch (\Throwable $th) {
            Log::error($th);

            return back()->with('upload_error', __('profile.' . $updateField . '.error'));
        }

        return back()->with('upload_success', __('profile.' . $updateField . '.success'));
    }
}
