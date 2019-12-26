<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserAuth
{

    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {

            return $next($request);
        }

        return redirect('login');
    }
}
