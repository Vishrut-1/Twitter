<?php

namespace App\Repositories;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class TwitterRepository
{

    public function profileCreateUpdate($data)
    {
        $profile = Profile::updateOrCreate(['id' => $data['id'], 'user_id' => Auth::id(), 'display_picture' => $data['image']], $data);

        return $profile;
    }

}
