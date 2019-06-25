<?php

namespace App\Http\Middleware;

use Closure;

class isBpp
{
    public function handle($request, Closure $next)
    {
        if (!auth()->guard('bpp')->check()) {
            return redirect(url('/'));
        }
        return $next($request);
    }
}
