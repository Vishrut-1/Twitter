<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{

    protected $table = 'follow';


    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
