<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeDislike extends Model
{

    protected $table = 'like_dislike';

    protected $fillable = ['user_id', 'tweets_id','like'];


    public function user()
    {

        return $this->belongsToMany('App\User');
    }


    public function tweets(){

        return $this->belongsTo('App\Models\Tweet');

    }
}
