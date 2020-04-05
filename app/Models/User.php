<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

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
     * Get the status posts of this user
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * Scope if user is Male.
     *
     * @return Boolean
     */
    public function scopeIsMale()
    {
        return $this->type == config('user.gender.male');
    }

    /**
     * Scope if user is Female.
     *
     * @return Boolean
     */
    public function scopeIsFemale()
    {
        return $this->type == config('user.gender.female');
    }
}
