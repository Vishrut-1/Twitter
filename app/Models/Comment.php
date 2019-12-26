<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['user_id', 'tweets_id', 'parent_id', 'comment'];

    protected $table = 'comments';


    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class );
    }

    public function tweet()
    {
        return $this->belongsToMany(Tweet::class);
    }

}
