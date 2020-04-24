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
     * relationship with User(sender).
     */
    public function sender()
    {
        return $this->belongsTo('App\Models\User', 'sender_id');
    }

    /**
     * relationship with User(receiver).
     */
    public function receiver()
    {
        return $this->belongsTo('App\Models\User', 'receiver_id');
    }

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

    /**
     * Scope notifications in descending order.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrderDesc($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Scope for get notification that is not.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsNotRead($query)
    {
        return $query->where('is_read', config('notification.is_not_read'));
    }
}
