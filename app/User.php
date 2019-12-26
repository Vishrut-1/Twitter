<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    protected $appends = ['followers_count','followings_count'];


    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }


    public function LikeDislike()
    {

        return $this->hasMany('App\Models\LikeDisLike');

    }

    public function tweets()
    {
        return $this->hasMany('App\Models\Tweet');
    }

    public function followers()
    {
        return $this->belongsToMany(User::Class, 'follow', 'follow_id', 'user_id')->withTimestamps();
    }

    public function followersAuthUser()
    {
        return $this->belongsToMany(User::Class, 'follow', 'follow_id', 'user_id')
            ->withTimestamps()
            ->select('follow.id')
            ->where('user_id', Auth::id());
    }

    public function followings()
    {
        return $this->belongsToMany(User::Class, 'follow', 'user_id', 'follow_id')->withTimestamps();
    }

//    public function getFollowersCountAttribute()
//    {
//        return count($this->followers);
//    }
//
//    public function getFollowingsCountAttribute()
//    {
//        return count($this->followings);
//    }

    public function follow()
    {
        return $this->belongsTo('App\Models\Follow');
    }

}
