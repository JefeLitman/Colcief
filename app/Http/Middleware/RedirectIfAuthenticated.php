<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next){
        $guards = ['estudiante', 'administrador', 'director', 'profesor'];
        foreach($guards as $guard){
            if (Auth::guard($guard)->check()) {
                return back();
            }
        }
        return $next($request);
    }
}
