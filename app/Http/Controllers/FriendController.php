<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FriendService;
use App\Services\UserService;
use App\Models\User;

class FriendController extends Controller
{
    protected $friendService;
    protected $userService;

    public function __construct(FriendService $friendService, UserService $userService)
    {
        $this->friendService = $friendService;
        $this->userService = $userService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendRequest(Request $request)
    {
        $friendId = $request->friend_id;

        $user = User::findOrFail($friendId);

        $suggestUser = $this->userService->getListNotFriend(auth()->user())->first();

        $relationship = auth()->user()->relationship($user)->first();

        $data = [
            'user_id' => auth()->id(),
            'friend_id' => $friendId,
            'status' => config('user.friend.request'),
        ];

        if (!$relationship || $relationship->status == config('user.friend.reject')) {
            $sendRequest = $this->friendService->create($data);

            $this->friendService->sendNotificationEvent($data['friend_id']);

            $htmlFriendSuggestion = $suggestUser ? view('pages.blocks.widgets.one_friend_suggestion', ['user' => $suggestUser])->render() : '';

            return response()->json([
                'status' => true,
                'html' => view('pages.blocks.widgets.un_request', compact('user'))->render(),
                'html_friend_suggestion' => $htmlFriendSuggestion,
            ]);
        }

        return response()->json([
            'status' => false,
        ]);
    }

    /**
     * Remove friend request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeRequest(Request $request)
    {
        $friendId = $request->friend_id;

        $user = User::findOrFail($friendId);

        $relationship = auth()->user()->relationship($user)->first();

        if ($relationship && $relationship->status == config('user.friend.request')) {
            $this->friendService->destroyRequest($relationship);

            $friendNotifications = $this->friendService->getNotificationById(auth()->id());

            return response()->json([
                'status' => true,
                'html' => view('pages.blocks.widgets.add_friend', compact('user'))->render(),
                'notification' => view('pages.blocks.widgets.friend_request_block', compact('friendNotifications'))->render()
            ]);
        }

        return response()->json([
            'status' => false,
        ]);
    }

    /**
     * Accept friend request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function acceptRequest(Request $request)
    {
        $friendId = $request->friend_id;

        $user = User::findOrFail($friendId);

        $relationship = auth()->user()->relationship($user)->first();

        $data = [
            'user_id' => auth()->id(),
            'friend_id' => $friendId,
            'status' => config('user.friend.accept')
        ];

        if ($relationship && $relationship->status == config('user.friend.request')) {
            $this->friendService->update(auth()->user()->relationship($user), $data['status']);
            $this->friendService->create($data);

            $this->friendService->sendNotificationEvent($relationship->user_id);

            $friendNotifications = $this->friendService->getNotificationById(auth()->id());

            return response()->json([
                'status' => true,
                'html' => view('pages.blocks.widgets.is_friend', compact('user'))->render(),
                'mark' => view('pages.blocks.widgets.friends_mark')->render(),
                'notification' => view('pages.blocks.widgets.friend_request_block', compact('friendNotifications'))->render()
            ]);
        }

        return response()->json([
            'status' => false,
        ]);
    }

    /**
     * Remove friend (unfriend).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeFriend(Request $request)
    {
        $friendId = $request->friend_id;

        $user = User::findOrFail($friendId);

        $relationship = auth()->user()->relationship($user)
            ->where('status', config('user.friend.accept'));

        if ($relationship->count() > 0) {
            $this->friendService->destroyRequest($relationship);

            return response()->json([
                'status' => true,
                'html' => view('pages.blocks.widgets.add_friend', compact('user'))->render(),
                'mark' => view('pages.blocks.widgets.friends_mark')->render(),
            ]);
        }

        return response()->json([
            'status' => false,
        ]);
    }

    /**
     * Get list of notifications.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNotificationList()
    {
        $friendNotifications = $this->friendService->getNotificationById(auth()->id());

        return response()->json([
            'html' => view('pages.blocks.widgets.friend_request_block', compact('friendNotifications'))->render()
        ]);
    }

    /**
     * Show all notifications page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAllNotification()
    {
        $friendNotifications = $this->friendService->getNotificationById(auth()->id());

        return view('pages.settings.request.index', compact('friendNotifications'));
    }
}
