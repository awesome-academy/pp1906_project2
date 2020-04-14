<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'content',
        'type'
    ];

    /**
     * relationship with User.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * relationship with Post.
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    /**
     * relationship with Comment.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'post_id');
    }

    /**
     * Scope if share was updated.
     *
     * @return Boolean
     */
    public function scopeIsUpdated()
    {
        return $this->updated_at > $this->created_at;
    }

    /**
     * Scope if share is public.
     *
     * @return Boolean
     */
    public function scopeIsPublic()
    {
        return $this->type == config('post.type.public');
    }

    /**
     * Scope if share is private.
     *
     * @return Boolean
     */
    public function scopeIsPrivate()
    {
        return $this->type == config('post.type.private');
    }

    /**
     * Scope if share is friends only.
     *
     * @return Boolean
     */
    public function scopeIsFriendsOnly()
    {
        return $this->type == config('post.type.only_friends');
    }

    /**
     * Scope order shares in descending order.
     *
     * @return Boolean
     */
    public function scopeOrderDesc($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
