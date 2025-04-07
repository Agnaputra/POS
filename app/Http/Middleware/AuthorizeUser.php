<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthorizeUser
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->level->level_kode === $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}

