<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
        $user = User::with('friends')->where('username', $username)->firstOrFail();

        $relationship = auth()->user()->relationship($user)->first();

        $posts = $this->postService->getListPosts($user, false);

        $postImages = $this->postService->getPhoto($user, config('user.last_photo'));

        if ($request->ajax()) {
            $nextPosts = view('pages.blocks.post', compact('posts'))->render();

            return response()->json([
                'html' => $nextPosts
            ]);
        }

        return view('pages.profile.timeline.index', compact('user', 'posts', 'relationship', 'postImages'));
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
        $user = User::with('friends')->where('username', $username)->firstOrFail();

        $relationship = auth()->user()->relationship($user)->first();

        $userFriends = $user->friends()->paginate(config('friend.page.number'));

        if ($request->ajax()) {
            $nextFriends = view('pages.blocks.widgets.friend_list_block', compact('userFriends'))->render();

            return response()->json([
                'html' => $nextFriends
            ]);
        }

        return view('pages.profile.friends.index', compact('user', 'relationship', 'userFriends'));
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

    public function showPhotos($username)
    {
        if (auth()->user()->username == $username) {
            $user = auth()->user();
            $relationship = null;
        } else {
            $user = User::where('username', $username)->firstOrFail();
            $relationship = auth()->user()->relationship($user)->first();
        }

        $posts = $this->postService->getListPosts($user, false);
        $postImages = $this->postService->getAllPhoto($user);

        return view('pages.profile.photos.index', compact('user', 'posts', 'relationship', 'postImages'));
    }

    public function showAbout(Request $request, $username)
    {
        if (auth()->user()->username == $username) {
            $user = auth()->user();
            $relationship = null;
        } else {
            $user = User::where('username', $username)->firstOrFail();
            $relationship = auth()->user()->relationship($user)->first();
        }

        return view('pages.profile.about.index', compact('user', 'relationship'));
    }
}
