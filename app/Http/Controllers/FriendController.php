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

        $checkFriends = $currentUser->isFriends($user)->exists();

        $data = [
            'user_id' => $currentUser->id,
            'friend_id' => $friendId,
            'status' => config('user.friend.request'),
        ];

        $updateFlag = false;

        if (!$checkFriends || $checkFriends->status == config('user.friend.reject')) {
            $sendRequest = $this->friendService->updateOrCreate($data);
            $updateFlag = true;
        }

        return response()->json([
            'status' => $updateFlag,
            'html' => view('pages.blocks.widgets.un_friend', compact('user'))->render(),
        ]);
    }
}
