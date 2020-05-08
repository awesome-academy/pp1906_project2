<?php

namespace App\Http\Controllers;

use App\Services\FriendService;
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
    public function __construct(UserService $userService, PostService $postService, FriendService $friendService)
    {
        $this->userService = $userService;
        $this->postService = $postService;
        $this->friendService = $friendService;
    }

    /**
     * Show today birthdays.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTodayBirthdays()
    {
        $todayBirthdayUsers = $this->friendService->getListFriendBirthdays(auth()->user(), now());

        return view('pages.birthdays.index', compact('todayBirthdayUsers'));
    }

    /**
     * Show the application dashboard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = $this->postService->getListPosts(auth()->user());

        $suggestUsers = $this->userService->getListNotFriend(
            auth()->user(),
            config('user.suggestion_friend')
        );

        $todayBirthdayUsers = $this->friendService->getListFriendBirthdays(auth()->user(), now());

        if ($todayBirthdayUsers->count() > 1) {
            $randomTodayBirthdayUser = $todayBirthdayUsers->random(1)->first();
        }

        if ($request->ajax()) {
            $nextPosts = view('pages.blocks.post', compact('posts'))->render();

            return response()->json([
                'html' => $nextPosts
            ]);
        }

        return view('pages.newsfeed.index', compact(
            'posts',
            'suggestUsers',
            'todayBirthdayUsers',
            'randomTodayBirthdayUser'
        ));
    }
}
