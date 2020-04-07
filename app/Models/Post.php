<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'content',
        'type'
    ];

    protected $dates = [
        'deleted_at'
    ];

    /**
     * Get the status posts of this user
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Scope if post was updated.
     *
     * @return Boolean
     */
    public function scopeIsUpdated()
    {
        return $this->updated_at > $this->created_at;
    }

    /**
     * Scope if post is public.
     *
     * @return Boolean
     */
    public function scopeIsPublic()
    {
        return $this->type == config('post.type.public');
    }

    /**
     * Scope if post is private.
     *
     * @return Boolean
     */
    public function scopeIsPrivate()
    {
        return $this->type == config('post.type.private');
    }

    /**
     * Scope if post is friends only.
     *
     * @return Boolean
     */
    public function scopeIsFriendsOnly()
    {
        return $this->type == config('post.type.only_friends');
    }

    /**
     * Scope order posts in descending order.
     *
     * @return Boolean
     */
    public function scopeOrderDesc($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
