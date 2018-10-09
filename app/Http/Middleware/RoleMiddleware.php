<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;

class RoleMiddleware{

    protected $auth;

    public function __construct(Auth $auth){
        $this->auth = $auth;
    }

    public function handle($request, Closure $next, $guard='admin'){
        $this->authenticate($guard);
        return $next($request);
    }

    protected function authenticate($guard){
        if (empty($guard)) {
            return $this->auth->authenticate();
        }

        if ($this->auth->guard($guard)->check()) {
            return $this->auth->shouldUse($guard);
        }
    }
}
