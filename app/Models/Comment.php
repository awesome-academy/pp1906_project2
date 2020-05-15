<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'post_id',
        'parent_id',
        'content',
    ];

    protected $dates = ['deleted_at'];

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
     * relationship with React.
     */
    public function reacts()
    {
        return $this->morphMany('App\Models\React', 'reactable');
    }

    /**
     * self relationship to get a comment's replies.
     */
    public function replies()
    {
        return $this->hasMany('App\Models\Comment', 'parent_id');
    }

    /**
     * self relationship to get parent comment of a reply.
     */
    public function parent()
    {
        return $this->belongsTo('App\Models\Comment', 'parent_id');
    }

    /**
     * Scope if comment is parent comment.
     *
     * @return Boolean
     */
    public function scopeIsOriginalParent()
    {
        return is_null($this->parent_id);
    }

    /**
     * Get root parent of a reply.
     *
     * @return Integer
     */
    public function getOriginalParent()
    {
        return is_null($this->parent_id) ? $this->id : $this->parent->getOriginalParent();
    }

    /**
     * Get all replies of a comment.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllChild()
    {
        $arr = [];

        foreach ($this->replies as $reply) {
            if ($reply->replies()->count() > 0) {
                $arr = $reply->getAllChild()->merge($arr);
            }

            $arr[] = $reply;
        }

        return collect($arr);
    }

    public function reactUsers()
    {
        return $this->belongsToMany('App\Models\User', 'reacts', 'reactable_id', 'user_id')
            ->select('users.id', 'name', 'username', 'avatar')
            ->where('reactable_type', 'App\Models\Comment')
            ->withPivot('type');
    }
}
