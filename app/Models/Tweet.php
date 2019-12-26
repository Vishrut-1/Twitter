<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{


    protected $fillable = ['content', 'user_id', 'image','parent_id'];

    protected $table = 'tweets';


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function LikeDislike()
    {
        return $this->hasMany('App\Models\LikeDislike', 'tweets_id');

    }

    public function parent()
    {
        return $this->belongsTo(Tweet::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Tweet::class, 'parent_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'tweets_id')->WhereNull('parent_id');
    }

    public function replies()
    {
        return $this->belongsTo(Comment::class);
    }

}
