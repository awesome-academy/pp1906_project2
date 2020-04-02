<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
