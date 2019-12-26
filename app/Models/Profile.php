<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
        protected $table = 'profile';

        protected $fillable = ['name','bio','location','dob','user_id','display_picture'];


        protected $casts = [

            'created_at' => 'date',

        ];

        public function user()
        {

            return $this->belongsTo('App\User');

        }

        public function tweets()
        {
            return $this->hasMany('App\Models\Tweet');

        }
}
