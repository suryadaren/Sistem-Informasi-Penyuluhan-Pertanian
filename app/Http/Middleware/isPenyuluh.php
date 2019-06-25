<?php

namespace App\Http\Middleware;

use Closure;

class isPenyuluh
{
    public function handle($request, Closure $next)
    {
        if (!auth()->guard('penyuluh')->check()) {
            return redirect(url('/'));
        }
        return $next($request);
    }
}
