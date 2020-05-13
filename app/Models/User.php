<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Friend;
use Illuminate\Support\Facades\DB;
use App\Notifications\ResetPassword as ResetPasswordNotification;

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
        return $this->belongsToMany('App\Models\User', 'friends', 'user_id', 'friend_id')->wherePivot('status', config('friend.status.accept'));
    }

    /**
     * relationship with posts.
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * relationship with notifications.
     */
    public function notifications()
    {
        return $this->hasMany('App\Models\Notification', 'receiver_id');
    }

    public function reactPosts()
    {
        return $this->belongsToMany('App\Models\Post', 'reacts', 'reactable_id', 'user_id');
    }

    public function reacts()
    {
        return $this->hasMany('App\Models\React');
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
     * Check relationship between users.
     *
     * @param App\Models\User $user
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function relationship($user)
    {
        return Friend::where(function ($query) use ($user) {
            $query->where('user_id', $this->id)
                ->where('friend_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('user_id', $user->id)
                ->where('friend_id', $this->id);
        });
    }

    /**
     * Count mutual friends of current user and selected user.
     *
     * @param Int $userId
     * @return Integer
     */
    public function countMutualFriends($userId)
    {
        return DB::table('friends as f1')
            ->select('f2.friend_id as mutual_ids')
            ->join('friends as f2', 'f2.friend_id', '=', 'f1.friend_id')
            ->where(function ($query) {
                $query->where('f1.user_id', auth()->id())
                    ->where('f1.status', config('user.friend.accept'));
            })
            ->where(function ($query) use ($userId) {
                $query->where('f2.user_id', $userId)
                    ->where('f2.status', config('user.friend.accept'));
            })
            ->pluck('mutual_ids')->count();
    }

    /**
     * Check if current user and specific user is both friends.
     *
     * @param Int $userId
     * @return \Illuminate\Http\Response
     */
    public function bothFriends($user)
    {
        return Friend::where(['user_id' => $this->id, 'friend_id' => $user->id, 'status' => config('user.friend.accept')])->exists();
    }

    /**
     * Get all waiting friend requests of a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFriendRequestsCount()
    {
        return Friend::where('friend_id', auth()->id())->count();
    }

    /**
     * Get user's chose language.
     *
     * @return String
     */
    public function getUserLanguage()
    {
        $languages = array_flip(config('user.language'));

        return $languages[$this->language];
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify((new ResetPasswordNotification($token, $this->name))->locale($this->getUserLanguage()));
    }
}
