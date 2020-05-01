<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FriendService;
use App\Models\User;

class FriendController extends Controller
{
    protected $friendService;

    public function __construct(FriendService $friendService)
    {
        $this->friendService = $friendService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendRequest(Request $request)
    {
        $currentUser = auth()->user();
        $friendId = $request->friend_id;
        $user = User::findOrFail($friendId);

        $relationship = $currentUser->isFriends($user)->first();

        $data = [
            'user_id' => $currentUser->id,
            'friend_id' => $friendId,
            'status' => config('user.friend.request'),
        ];

        if (!$relationship || $relationship->status == config('user.friend.reject')) {
            $sendRequest = $this->friendService->create($data);

            $this->friendService->sendNotificationEvent($data['friend_id']);

            return response()->json([
                'status' => true,
                'html' => view('pages.blocks.widgets.un_request', compact('user'))->render(),
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
        $currentUser = auth()->user();
        $friendId = $request->friend_id;
        $user = User::findOrFail($friendId);

        $relationship = $currentUser->isFriends($user)->first();

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
        $currentUser = auth()->user();
        $friendId = $request->friend_id;
        $user = User::findOrFail($friendId);

        $relationship = $currentUser->isFriends($user)->first();

        $data = [
            'user_id' => $currentUser->id,
            'friend_id' => $friendId,
            'status' => config('user.friend.accept')
        ];

        if ($relationship && $relationship->status == config('user.friend.request')) {
            $this->friendService->update($currentUser->isFriends($user), $data['status']);
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
     * Get list of notifications.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getNotificationList(Request $request)
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
