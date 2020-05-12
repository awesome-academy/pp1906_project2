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
        'image',
        'share_from_post_id'
    ];

    protected $dates = [
        'deleted_at'
    ];

    /**
     * relationship with User.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function reactUsers()
    {
        return $this->belongsToMany('App\Models\User', 'reacts', 'reactable_id', 'user_id')
            ->select('users.id', 'name', 'username', 'avatar')
            ->where('reactable_type', 'App\Models\Post')
            ->withPivot('type');
    }

    /**
     * relationship with Comment.
     */
    public function parentComments()
    {
        return $this->hasMany('App\Models\Comment')->whereNull('parent_id');
    }

    /**
     * child relationship with Post.
     */
    public function shares()
    {
        return $this->hasMany('App\Models\Post', 'share_from_post_id');
    }

    /**
     * parent relationship with Post.
     */
    public function share()
    {
        return $this->belongsTo('App\Models\Post', 'share_from_post_id');
    }

    public function reacts()
    {
        return $this->morphMany('App\Models\React', 'reactable');
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
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Http\Response
     */
    public function scopeOrderDesc($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
