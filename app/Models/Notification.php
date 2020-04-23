<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'type',
        'is_read',
        'post_id',
        'comment_id',
    ];

    /**
     * relationship with Post.
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }

    /**
     * relationship with Comment.
     */
    public function comment()
    {
        return $this->belongsTo('App\Models\Comment', 'comment_id');
    }
}
