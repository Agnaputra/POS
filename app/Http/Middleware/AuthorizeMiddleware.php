<?php

// app/Http/Middleware/AuthorizeMiddleware.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorizeMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->level->level_kode === $role) {
            return $next($request);
        }
        abort(403, 'Unauthorized access');
    }
}
