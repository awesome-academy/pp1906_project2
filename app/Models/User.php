<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Friend;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'address',
        'birthday',
        'gender',
        'introduce',
        'avatar',
        'cover',
        'language',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['deleted_at'];

    /**
     * relationship with friends
     */
    public function friends()
    {
        return $this->hasMany('App\Models\Friend');
    }

    /**
     * relationship with posts.
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * Scope current user.
     *
     * @return Boolean
     */
    public function scopeIsCurrentUser()
    {
        return $this->id == auth()->id();
    }

    /**
     * Scope if user is Male.
     *
     * @return Boolean
     */
    public function scopeIsMale()
    {
        return $this->gender == config('user.gender.male');
    }

    /**
     * Scope if user is Female.
     *
     * @return Boolean
     */
    public function scopeIsFemale()
    {
        return $this->gender == config('user.gender.female');
    }

    /**
     * Scope check relationship between users.
     *
     * @param App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function isFriends($user)
    {
        return Friend::where(['user_id' => auth()->id(), 'friend_id' => $user->id])
            ->orWhere(['user_id' => $user->id, 'friend_id' => auth()->id()]);
    }
}
