<?php

namespace App\Http\Middleware;



use App\Traits\RolesTrait;
use Closure;

class AdminMiddleware
{
    use RolesTrait;
    public function handle($request, Closure $next)
    {
        if ($this->getRole() === 'teacher'){
            return abort(403);
        }
        if ($this->getRole() === 'user'){
            return abort(403);
        }
        if ($this->getRole() === 'student'){
            return abort(403);
        }
        return $next($request);
    }
}
