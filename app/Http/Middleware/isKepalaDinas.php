<?php

namespace App\Http\Middleware;

use Closure;

class isKepalaDinas
{
    public function handle($request, Closure $next)
    {
        if (!auth()->guard('kepala_dinas')->check()) {
            return redirect(url('/'));
        }
        return $next($request);
    }
}
