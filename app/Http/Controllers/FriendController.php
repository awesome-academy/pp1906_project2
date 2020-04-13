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

            return response()->json([
                'status' => true,
                'html' => view('pages.blocks.widgets.add_friend', compact('user'))->render(),
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

            return response()->json([
                'status' => true,
                'html' => view('pages.blocks.widgets.is_friend', compact('user'))->render(),
                'mark' => view('pages.blocks.widgets.friends_mark')->render(),
            ]);
        }

        return response()->json([
            'status' => false,
        ]);
    }
}
