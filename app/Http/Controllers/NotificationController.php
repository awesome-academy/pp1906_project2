<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Notification;

class NotificationController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getNotificationList(Request $request)
    {
        $notifications = $this->notificationService->getNotificationById(auth()->id());

        return response()->json([
            'html' => view('pages.blocks.widgets.notification-block', compact('notifications'))->render()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showNotificationPost($id)
    {
        $notification = Notification::findOrFail($id);

        $post = $notification->post_id;

        $setNotificationIsRead = $this->notificationService->setNotificationIsRead($notification);

        if ($setNotificationIsRead) {
            return redirect()->route('posts.show', compact('post'));
        }

        return back()->with('error', __('notification.error'));
    }
}
