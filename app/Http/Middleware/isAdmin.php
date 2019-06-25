<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
{
    public function handle($request, Closure $next)
    {
        if (!auth()->guard('admin')->check()) {
            return redirect(url('/'));
        }
        return $next($request);
    }
}
