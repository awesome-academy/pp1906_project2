<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\User;

class PostReacted implements ShouldBroadcast
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
        return 'post-reacted';
    }
}
