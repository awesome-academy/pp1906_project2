<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Friend extends Model
{
    protected $fillable = [
        'user_id',
        'friend_id',
        'status',
    ];

    /**
     * relationship with User(sender).
     */
    public function sender()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * relationship with User(receiver).
     */
    public function receiver()
    {
        return $this->belongsTo('App\Models\User', 'friend_id');
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
}
