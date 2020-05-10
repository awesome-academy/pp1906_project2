<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable = [
        'user_id',
        'post_id',
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
     * Scope if activity is like.
     *
     * @return Boolean
     */
    public function scopeIsLike()
    {
        return $this->type == config('activity.type.like');
    }

    /**
     * Scope if activity is love.
     *
     * @return Boolean
     */
    public function scopeIsLove()
    {
        return $this->type == config('activity.type.love');
    }

    /**
     * Scope if activity is upload.
     *
     * @return Boolean
     */
    public function scopeIsUpload()
    {
        return $this->type == config('activity.type.upload');
    }

    /**
     * Scope if activity is comment.
     *
     * @return Boolean
     */
    public function scopeIsComment()
    {
        return $this->type == config('activity.type.comment');
    }

    /**
     * Scope if activity is share.
     *
     * @return Boolean
     */
    public function scopeIsShare()
    {
        return $this->type == config('activity.type.share');
    }

    /**
     * Scope activities in descending order.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrderDesc($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
