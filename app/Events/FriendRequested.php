<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FriendRequested implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $receiverId;

    public function __construct($receiverId)
    {
        $this->receiverId = $receiverId;
    }

    public function broadcastOn()
    {
        return ['socialyte_' . $this->receiverId];
    }

    public function broadcastAs()
    {
        return 'friend-requested';
    }
}
