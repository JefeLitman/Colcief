<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware{

    public function handle($request, Closure $next, ...$guards){
        foreach ($guards as $guard) {
            $auth = Auth::guard($guard);
            if ($auth->check()) {
                switch($guard){
                    case 'administrador':
                        if($auth->user()->role == '0'){
                            return $next($request);
                        }
                        break;
                    case 'director':
                        if($auth->user()->role == '2'){
                            return $next($request);
                        }
                        break;
                    case 'profesor':
                        if($auth->user()->role == '1'){
                            return $next($request);
                        }
                        break;
                    case 'estudiante':
                        return $next($request);
                        break;
                }
            }
        }
        return back();
    }
}
